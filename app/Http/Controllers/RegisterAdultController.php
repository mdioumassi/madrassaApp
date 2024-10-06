<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserStoreRequest;
use App\Models\Course;
use App\Models\Level;
use App\Models\User;
use Illuminate\Http\Request;

class RegisterAdultController extends Controller
{
    /**
     * Step 0: Register Adult
     * route: step0.register.adult.create
     * name: step0.register.adult.create
     * Method: GET
     */
    public function Step0RegisterAdultCreate()
    {
        return view('registrations.adult.step0-create');
    }

    /**
     * Step 0: Register Adult
     * route: step0.register.adult.store
     * name: step0.register.adult.store
     * Method: POST
     */
    public function Step0RegisterAdultStore(UserStoreRequest $request, User $user)
    {
        $validatedData = $request->validated();
        $email = $request['email'];
        $userIsExist = $user->isEmailExist($email);
        if ($userIsExist) {
            $user = $user->where('email', $email)->first();
            return redirect()->route('step1.register.adult', $user->id);
        } else {
            $validatedData['email'] = $email;
            $adult = User::create($validatedData);
            return redirect()->route('step1.register.adult', $adult->id);
        }
    }

    /**
     * Step 1: Register Adult
     * route: step1.register.adult
     * name: step1.register.adult
     * Method: GET
     */
    public function Step1RegisterAdult(Request $request, $adultId)
    {
        $registration_data = [
            'child_id' => null,
            'level_id' => null,
            'course_id' => null,
            'adult_id' => $adultId,
            'registration_date' => null,
            'payment_date' => null,
            'payment_amount' => null,
            'payment_method' => null,
            'payment_note' => null,
            'payment_status' => null,
            'registration_status' => null,
        ];
        $request->session()->put('registration_data', $registration_data);

        return redirect()->route('step2.register.level.adult');
    }

    /**
     * Step 2: Register Adult
     * route: step2.register.level.adult
     * name: step2.register.level.adult
     * Method: GET
     */
    public function Step2RegisterLevelAdult(Request $request)
    {
        $levels = Level::join('courses', 'levels.course_id', '=', 'courses.id')
            ->where('courses.keywords', 'arabe-adulte')
            ->orWhere('courses.keywords', 'coran-adulte')
            ->get();
        return view('admin.levels.grille-course-adult', compact('levels'));
    }

    /**
     * Step 2: Register Adult
     * route: step2.register.adult.post
     * name: step2.register.adult.post
     * Method: POST
     */
    public function Step2RegisterAdultPost(Request $request)
    {
        $registration_data = $request->session()->get('registration_data');
        $registration_data['level_id'] = $request['levelId'];
        $registration_data['course_id'] = Level::find($request['levelId'])->course_id;
        $request->session()->put('registration_data', $registration_data);

        return redirect()->route('step3.register.adult.schooling');
    }

    /**
     * Step 3: Register Adult Schooling
     * route: step3.register.adult
     * name: step3.register.adult.schooling
     * Method: GET
     */
    public function Step3RegisterAdultSchooling(Request $request)
    {
        $registration_data = $request->session()->get('registration_data');

        $adult = User::find($registration_data['adult_id']);
        $level = Level::find($registration_data['level_id']);
        $course = Course::find($registration_data['course_id']);

        return view('registrations.schooling-adult', compact('adult', 'level', 'course'));
    }

    /**
     * Step 3: Register Adult Schooling Post
     * route: step3.register.adult.post
     * name: step3.register.adult.post
     * Method: POST
     */
    public function Step3RegisterAdultSchoolingPost(Request $request)
    {
        $registration_data = $request->session()->get('registration_data');

        $registration_data['payment_amount'] = $request['payment_amount'];
        $request->session()->put('registration_data', $registration_data);

        return redirect()->route('step4.register.adult.payment');
    }

    /**
     * Step 4: Register Adult Payment
     * route: step4.register.adult.payment
     * name: step4.register.adult.payment
     * Method: GET
     */
    public function Step4RegisterAdultPayment(Request $request)
    {
        $registration_data = $request->session()->get('registration_data');

        $payment = $registration_data['payment_amount'];

        return view('registrations.payment-adult', compact('payment'));
    }

    /**
     * Step 4: Register Adult Payment Post
     * route: step4.register.adult.post
     * name: step4.register.adult.post
     * Method: POST
     */
    public function Step4RegisterAdultPaymentPost(Request $request)
    {
        $registration_data = $request->session()->get('registration_data');

        $registration_data['payment_method'] = $request['payment_method'];
        $registration_data['payment_date'] = $request['payment_date'];
        $registration_data['payment_note'] = $request['payment_note'];

        if ($registration_data['payment_method'] === 'espece') {
            $registration_data['payment_status'] = 'paid';
            $registration_data['registration_status'] = 'registered';
        } else {
            $registration_data['payment_status'] = 'pending';
            $registration_data['registration_status'] = 'unregistered';
        }

        $registration_data['registration_date'] = date('Y-m-d');

        $request->session()->put('registration_data', $registration_data);

        return redirect()->route('step5.register.adult.recap');
    }

    /**
     * Step 5: Register Adult Recap
     * route: step5.register.adult.recap
     * name: step5.register.adult.recap
     * Method: GET
     */
    public function Step5RegisterAdultRecap(Request $request)
    {
        $registration_data = $request->session()->get('registration_data');

        $adult = User::find($registration_data['adult_id']);
        $level = Level::find($registration_data['level_id']);
        $course = Course::find($registration_data['course_id']);
        $total_amount = $registration_data['payment_amount'];
        $payment_method = $registration_data['payment_method'];
        $payment_date = $registration_data['payment_date'];
        $payment_status = $registration_data['payment_status'];

        return view('registrations.recap-adult', compact('adult', 'level', 'course', 'total_amount', 'payment_method', 'payment_date', 'payment_status'));
    }
}
