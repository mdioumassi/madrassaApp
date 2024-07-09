<?php

namespace App\Http\Controllers;

use App\Models\Child;
use App\Models\Course;
use App\Models\Level;
use App\Models\Registration;
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
            'payment_comment' => null,
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

        return redirect()->route('step3.register.payment');
    }

    /**
     * Step 3: Register Payment
     * route: step3.register.payment
     * Method: GET
     */
    public function Step3RegisterPayment(Request $request)
    {
        $registration_data = $request->session()->get('registration_data');

        $child = Child::find($registration_data['child_id']);
        $level = Level::find($registration_data['level_id']);
        $course = Course::find($registration_data['course_id']);

        return view('registrations.payment', compact('child', 'level', 'course'));
    }

    /**
     * Step 3: Register Payment Post
     * route: step3.register.payment.post
     * Method: POST
     */
    public function Step3RegisterPaymentPost(Request $request) {
        $registration_data = $request->session()->get('registration_data');
        $registration_data['payment_date'] = $request['payment_date'];
        $registration_data['payment_amount'] = $request['payment_amount'];
        $registration_data['payment_method'] = $request['payment_method'];
        $registration_data['payment_comment'] = $request['payment_comment'];
        $registration_data['payment_status'] = 'pending';
        $registration_data['registration_status'] = 'pending';
        $request->session()->put('registration_data', $registration_data);

        return redirect()->route('step4.register.recap');
    }

    public function Step3RegisterRecap(Request $request)
    {
        $registration_data = $request->session()->get('registration_data');

        $child = Child::find($registration_data['child_id']);
        $level = Level::find($registration_data['level_id']);
        $course = Course::find($registration_data['course_id']);
        //$adult = User::find($registration_data['adult_id']);

        return view('registrations.recap', compact('child', 'level', 'course'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('registrations.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Registration $registration)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Registration $registration)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Registration $registration)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Registration $registration)
    {
        //
    }
}
