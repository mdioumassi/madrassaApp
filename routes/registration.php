<?php

use App\Http\Controllers\RegisterAdultController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistrationController;

//Registration child
Route::post('/register/step0/parent/store', [RegistrationController::class, 'Step0RegisterParentStore'])->name('step0.register.parent.store');
Route::get('/register/step0/parent/create', [RegistrationController::class, 'Step0RegisterParentCreate'])->name('step0.register.parent.create');
Route::get('/register/step1/parent/{id}/child', [RegistrationController::class, 'Step1RegisterChildCreate'])->name('step1.register.child.create');
Route::post('/register/step1/parent/{id}/child/store', [RegistrationController::class, 'Step1RegisterChildStore'])->name('step1.register.child.store');
Route::get('/register/step1/child/{id}', [RegistrationController::class, 'Step1RegisterChild'])->name('step1.register.child');
Route::get('/register/step2/levels/child', [RegistrationController::class, 'Step2RegisterLevelChild'])->name('step2.register.level.child');
Route::post('/register/step2/level/adult', [RegistrationController::class, 'Step2RegisterLevelPost'])->name('step2.register.level.post');
Route::get('/register/step3/schooling', [RegistrationController::class, 'Step3RegisterSchooling'])->name('step3.register.schooling');
Route::post('/register/step3/schooling', [RegistrationController::class, 'Step3RegisterSchoolingPost'])->name('step3.register.schooling.post');
Route::get('/register/step4/payment', [RegistrationController::class, 'Step4RegisterPayment'])->name('step4.register.payment');
Route::post('/register/step4/payment', [RegistrationController::class, 'Step4RegisterMeansOfPayment'])->name('step4.register.means.payment');
Route::get('/register/step4/recap', [RegistrationController::class, 'Step4RegisterRecap'])->name('step4.register.recap');
Route::post('/register/step4/recap', [RegistrationController::class, 'Step4RegisterRecapPost'])->name('step4.register.recap.post');
Route::get('/register/fiche', [RegistrationController::class, 'Step5RegisterFiche'])->name('step5.registration.fiche');

//Registration adult
//  Route::get('/register/step0/adult/create', [RegisterAdultController::class, 'Step0RegisterAdultCreate'])->name('step0.register.adult.create');
//  Route::post('/register/step0/adult/store', [RegisterAdultController::class, 'Step0RegisterAdultStore'])->name('step0.register.adult.store');
// Route::get('/register/step1/adult/{id}', [RegisterAdultController::class, 'Step1RegisterAdult'])->name('step1.register.adult');
// Route::get('/register/step2/levels', [RegisterAdultController::class, 'Step2RegisterLevelAdult'])->name('step2.register.level.adult');
// Route::post('/register/step2/adult', [RegisterAdultController::class, 'Step2RegisterAdultPost'])->name('step2.register.adult.post');
// Route::get('/register/step3/adult/schooling', [RegisterAdultController::class, 'Step3RegisterAdultSchooling'])->name('step3.register.adult.schooling');
// Route::post('/register/step3/schooling', [RegisterAdultController::class, 'Step3RegisterAdultSchoolingPost'])->name('step3.register.schooling.post');
// Route::get('/register/step4/adult/payment', [RegisterAdultController::class, 'Step4RegisterAdultPayment'])->name('step4.register.adult.payment');
// Route::post('/register/step4/adult', [RegisterAdultController::class, 'Step4RegisterAdultPaymentPost'])->name('step4.register.adult.payment.post');

// Route::get('/register/step5/adult/recap', [RegisterAdultController::class, 'Step5RegisterAdultRecap'])->name('step5.register.adult.recap');
// Route::post('/register/step5/adult', [RegisterAdultController::class, 'Step5RegisterAdultPost'])->name('step5.register.adult.post');
// Route::get('/register/step6/adult/{id}', [RegisterAdultController::class, 'Step6RegisterAdult'])->name('step6.register.adult');
// Route::post('/register/step6/adult', [RegisterAdultController::class, 'Step6RegisterAdultPost'])->name('step6.register.adult.post');