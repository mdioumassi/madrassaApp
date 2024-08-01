<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChildStoreRequest;
use App\Http\Requests\UserStoreRequest;
use App\Models\Child;
use App\Models\Course;
use App\Models\Level;
use App\Models\Registration;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class RegistrationController extends Controller
{
    /**
     * Liqte des enfants inscrits
     * route: /registrations/children
     * name: registrations.children
     */
    public function listChildren()
    {
        $children = Registration::where('child_id', '!=', null)->get();

        return view('registrations.children', ['registrations' => $children]);
    }

    /**
     * Liste des adultes inscrits
     * route: /registrations/adults
     * name: registrations.adults
     */
    public function listAdults()
    {
        $adults = Registration::where('adult_id', '!=', null)->get();

        return view('registrations.adults', ['registrations' => $adults]);
    }


    /**
     * Step 0: Liste de choix des parents
     * route: /register/step0/parent/choice
     * name: step0.register.parent.choice
     * Method: GET
     */
    public function Step0RegisterParentChoice()
    {
        $parents = User::where('type', 'parent')->latest()->paginate(8);

        if ($parents->isEmpty()) {
            return redirect()->route('step0.register.parent.create');
        }

        return view('registrations.parents.choice', compact('parents'));
    }

    /**
     * Step 0: Liste de choix des enfants
     * route: /register/step1/parent/{id}/children
     * name: step1.register.child.choice
     * Method: GET
     */
    public function Step0RegisterChildrenChoice(int $parenId)
    {
        $children = User::where('id', $parenId)->first()->children;
        $parent = User::where('id', $parenId)->first();

        if ($children->isEmpty()) {
            return redirect()->route('step1.register.child.create', $parenId);
        }

        return view('registrations.children.choice', compact('children', 'parent'));
    }

    /**
     * Step 0: Ajouter un parent
     * route: /register/step0/parent/create
     * name: step0.register.parent.create
     * Method: GET
     */
    public function Step0RegisterParentCreate()
    {
        return view('registrations.parents.create');
    }

    /**
     * Step 0: ajouter un parent
     * route: /register/step0/parent/store
     * name: step0.register.parent.store
     * Method: POST
     */
    public function Step0RegisterParentStore(UserStoreRequest $request, User $user)
    {
        $validatedData = $request->validated();
        $email = $request['email'];

        $userIsExist = $user->isEmailExist($email);
        if ($userIsExist) {
            $user = $user->where('email', $email)->first();
            return redirect()->route('step1.register.child.create', $user->id);          
        } else {
            $validatedData['email'] = $email;
            $parent = User::create($validatedData);
            $parent->assignRole($request->input('roles'));
            return redirect()->route('step1.register.child.create', $parent->id);
        }
    }

    /**
     * Step 1: Ajouter un enfant
     * route: /register/step1/parent/{id}/child
     * name: step1.register.child.create
     * Method: GET
     */
    public function Step1RegisterChildCreate($parenId)
    {
        $user = User::find($parenId);
        return view('registrations.children.create', compact('user'));
    }

    /**
     * Step 1: Ajouter un enfant
     * route: /register/step1/parent/{id}/child/store
     * name: step1.register.child.store
     * Method: POST
     */
    public function Step1RegisterChildStore(ChildStoreRequest $request, $parentId, Child $child): RedirectResponse
    {
        $validatedData = $request->validated();
        $firstname = $validatedData['firstname'];
        $lastname = $validatedData['lastname'];
   
        if ($child->isExist($firstname, $lastname, $parentId)) {
            $child = $child
                        ->where('firstname', $firstname)
                        ->where('lastname', $lastname)
                        ->where('parent_id', $parentId)->first();
            return redirect()->route('step1.register.child', $child->id);
        } else {
            if ($request->hasFile('photo') && $request->file('photo')->isValid()) {
                $photo = time().'.'.$request->photo->extension();  
                $request->photo->move(public_path('photos'), $photo);
                //$request->photo->move(Storage::disk('public')->path('photos'), $photo);
                $validatedData['photo'] = $photo;
            }

            $parent = User::where('id', $parentId)->first();

            $child = $parent->children()->create($validatedData);
    
            return redirect()->route('step1.register.child', $child->id);
        }
    }


    /**
     * Step 1: Enregistrement session enfant
     * route: /register/step1/child/{id}
     * Method: GET
     */
    public function Step1RegisterChild(Request $request, $child_id): RedirectResponse
    {
        $registration_data = [
            'child_id' => $child_id,
            'level_id' => null,
            'course_id' => null,
            'adult_id' => null,
            'registration_date' => null,
            'payment_date' => null,
            'payment_amount' => null,
            'payment_method' => null,
            'payment_note' => null,
            'payment_status' => null,
            'registration_status' => null,
        ];
        $request->session()->put('registration_data', $registration_data);

        return redirect()->route('step2.register.level.child', $child_id);
    }

    /**
     * Step 2: Liste des niveaux pour enfant
     * route: /register/step2/levels/child/{id}
     * Method: GET
     */
    public function Step2RegisterLevelChild(Request $request, $childId)
    {
        $parent = Child::find($childId)->parent;
        $child = Child::find($childId);
        $levels = Level::join('courses', 'levels.course_id', '=', 'courses.id')
            ->where('courses.keywords', 'arabe-enfant')
            ->orWhere('courses.keywords', 'coran-enfant')
            ->select('levels.*', 'courses.keywords')
            ->get();

        return view('admin.levels.grille-course-child', compact('levels','parent','child','childId'));
    }

    /**
     * Step 2: Choisir un niveau
     * route: /register/step2/level/store
     * name: step2.register.level.post
     * Method: POST
     */
    public function Step2RegisterLevelPost(Request $request)
    {
        $registration_data = $request->session()->get('registration_data');
        $registration_data['child_id'] = $request['childId'];
        $registration_data['level_id'] = $request['levelId'];
        $registration_data['course_id'] = Level::find($request['levelId'])->course_id;
    
        $request->session()->put('registration_data', $registration_data);

        return redirect()->route('step3.register.schooling');
    }

    /**
     * Step 3: Scolarité
     * route: /register/step3/schooling
     * name: step3.register.schooling
     * Method: GET
     */
    public function Step3RegisterSchooling(Request $request)
    {
        $registration_data = $request->session()->get('registration_data');
     
        $child = Child::find($registration_data['child_id']);
        $level = Level::find($registration_data['level_id']);
        $course = Course::find($registration_data['course_id']);

        return view('registrations.schooling', compact('child', 'level', 'course'));
    }

    /**
     * Step 3: Scolarité
     * route: /register/step3/schooling/store
     * name: step3.register.schooling.post
     * Method: POST
     */
    public function Step3RegisterSchoolingPost(Request $request) {

        $registration_data = $request->session()->get('registration_data');
    
        $registration_data['payment_amount'] = $request['payment_amount'];

        $request->session()->put('registration_data', $registration_data);

        return redirect()->route('step4.register.payment');
    }

    /**
     * Step 4: Paiement
     * route: /register/step4/payment
     * name: step4.register.payment
     * Method: GET
     */
    public function Step4RegisterPayment(Request $request)
    {
        $registration_data = $request->session()->get('registration_data');

        $payment = $registration_data['payment_amount'];

        return view('registrations.payment', compact('payment'));
    }

    /**
     * Step 4: Register Means of Payment
     * route: /register/step4/payment/store
     * name: step4.register.means.payment
     * Method: POST
     */
    public function Step4RegisterMeansOfPayment(Request $request)
    {
        $registration_data = $request->session()->get('registration_data');

        $registration_data['payment_method'] = $request['payment_method'];
        $registration_data['payment_date'] = $request['payment_date'];
        $registration_data['payment_note'] = $request['payment_note'];

        if ($registration_data['payment_method'] === 'espece'){
            $registration_data['payment_status'] = 'paid';
            $registration_data['registration_status'] = 'registered';
        } else {
            $registration_data['payment_status'] = 'pending';
            $registration_data['registration_status'] = 'unregistered';
        }

        $registration_data['registration_date'] = date('Y-m-d');

        $request->session()->put('registration_data', $registration_data);

        return redirect()->route('step4.register.recap');
    }

    /**
     * Step 4: Register Recap
     * route: /register/step4/recap
     * name: step4.register.recap
     * Method: GET
     *
     */
    public function Step4RegisterRecap(Request $request)
    {
        $registration_data = $request->session()->get('registration_data');
       

        $child = Child::find($registration_data['child_id']);
        $level = Level::find($registration_data['level_id']);
        $course = Course::find($registration_data['course_id']);
        $total_amount = $registration_data['payment_amount'];
        $payment_method = $registration_data['payment_method'];
        $payment_date = $registration_data['payment_date'];
        $payment_status = $registration_data['payment_status'];

        return view('registrations.recap', compact('child', 'level', 'course', 'total_amount', 'payment_method', 'payment_date', 'payment_status'));
    }

    /**
     * Step 4: Register Recap Post
     * route: /register/step4/recap/store
     * name: step4.register.recap.post
     * Method: POST
     */
    public function Step4RegisterRecapPost(Request $request)
    {
        $registration_data = $request->session()->get('registration_data');

        Registration::create($registration_data);

        return redirect()->route('step5.registration.child.fiche');
    }


    /**
     * Step 5: Register Fiche
     * route: /register/child/fiche
     * name: step5.registration.child.fiche
     * Method: GET
     */
    public function Step5RegisterChildFiche(Request $request)
    {
        $registration_data = $request->session()->get('registration_data');

        $child = Child::find($registration_data['child_id']);
        $level = Level::find($registration_data['level_id']);
        $course = Course::find($registration_data['course_id']);
        $total_amount = $registration_data['payment_amount'];
        $payment_method = $registration_data['payment_method'];
        $payment_date = $registration_data['payment_date'];
        $payment_status = $registration_data['payment_status'];

        return view('registrations.fiche', compact(
            'child', 'level', 'course', 'total_amount', 'payment_method', 'payment_date', 'payment_status'
        ));
    }
}
