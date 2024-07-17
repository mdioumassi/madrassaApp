<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChildStoreRequest;
use App\Models\Child;
use App\Models\Course;
use App\Models\Level;
use App\Models\Registration;
use App\Models\User;
use Illuminate\Http\Client\Request as ClientRequest;
use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $registrations = Registration::latest()->paginate(8);

        return view('registrations.index', compact('registrations'));
    }

    public function Step1RegisterChildCreate($parenId)
    {
        $user = User::find($parenId);
        return view('registrations.create', compact('user'));
    }

    public function Step1RegisterChildStore(ChildStoreRequest $request, $parentId)
    {
        $parent = User::where('id', $parentId)->first();

        $child = $parent->children()->create($request->validated());

        return redirect()->route('step1.register.child', $child->id);
    }


    /**
     * Step 1: Register Child
     * route: step1.register.child
     * Method: GET
     */
    public function Step1RegisterChild(Request $request, $child_id)
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

        return redirect()->route('step2.register.level', 'child');
    }

    /**
     * Step 2: Register Level
     * route: step2.register.level
     * Method: GET
     */
    public function Step2RegisterLevel(Request $request, $child)
    {
        $levels = Level::all();
        return view('admin.levels.grille', compact('levels', 'child'));
    }

    /**
     * Step 2: Register Level Post
     * route: step2.register.level.post
     * Method: POST
     */
    public function Step2RegisterLevelPost(Request $request)
    {
        $registration_data = $request->session()->get('registration_data');
        $registration_data['level_id'] = $request['levelId'];
        $registration_data['course_id'] = Level::find($request['levelId'])->course_id;
        $request->session()->put('registration_data', $registration_data);

        return redirect()->route('step3.register.schooling');
    }

    /**
     * Step 3: Register Payment
     * route: step3.register.payment
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
     * Step 3: Register Payment Post
     * route: step3.register.schooling.post
     * Method: POST
     */
    public function Step3RegisterSchoolingPost(Request $request) {
        $registration_data = $request->session()->get('registration_data');
    
        $registration_data['payment_amount'] = $request['payment_amount'];
   
        $request->session()->put('registration_data', $registration_data);

        return redirect()->route('step4.register.payment');
    }

    /**
     * Step 4: Register Payment
     * route: step4.register.payment
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
     * route: step4.register.means.payment
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
            $registration_data['registration_status'] = 'pending';
        }

        $registration_data['registration_date'] = date('Y-m-d');

        $request->session()->put('registration_data', $registration_data);

        return redirect()->route('step4.register.recap');
    }

    /**
     * Step 4: Register Recap
     * route: step4.register.recap
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
     * route: step4.register.recap.post
     * Method: POST
     */
    public function Step4RegisterRecapPost(Request $request)
    {
        $registration_data = $request->session()->get('registration_data');

        Registration::create($registration_data);

        return redirect()->route('step5.registration.fiche');
    }


    /**
     * Step 5: Register Fiche
     * route: step5.register.fiche
     * Method: GET
     */
    public function Step5RegisterFiche(Request $request)
    {
        $registration_data = $request->session()->get('registration_data');

        $child = Child::find($registration_data['child_id']);
        $level = Level::find($registration_data['level_id']);
        $course = Course::find($registration_data['course_id']);
        $total_amount = $registration_data['payment_amount'];
        $payment_method = $registration_data['payment_method'];
        $payment_date = $registration_data['payment_date'];
        $payment_status = $registration_data['payment_status'];


        return view('registrations.fiche', compact('child', 'level', 'course', 'total_amount', 'payment_method', 'payment_date', 'payment_status'));
    }
}
