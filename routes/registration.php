<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistrationController;

Route::get('/register/step1/parent/{id}/child', [RegistrationController::class, 'Step1RegisterChildCreate'])->name('step1.register.child.create');
Route::post('/register/step1/parent/{id}/child/store', [RegistrationController::class, 'Step1RegisterChildStore'])->name('step1.register.child.store');
Route::get('/register/step1/child/{id}', [RegistrationController::class, 'Step1RegisterChild'])->name('step1.register.child');
Route::get('/register/step2/level/{child}', [RegistrationController::class, 'Step2RegisterLevel'])->name('step2.register.level');
Route::post('/register/step2/level', [RegistrationController::class, 'Step2RegisterLevelPost'])->name('step2.register.level.post');
Route::get('/register/step3/schooling', [RegistrationController::class, 'Step3RegisterSchooling'])->name('step3.register.schooling');
Route::post('/register/step3/schooling', [RegistrationController::class, 'Step3RegisterSchoolingPost'])->name('step3.register.schooling.post');
Route::get('/register/step4/payment', [RegistrationController::class, 'Step4RegisterPayment'])->name('step4.register.payment');
Route::post('/register/step4/payment', [RegistrationController::class, 'Step4RegisterMeansOfPayment'])->name('step4.register.means.payment');
Route::get('/register/step4/recap', [RegistrationController::class, 'Step4RegisterRecap'])->name('step4.register.recap');
Route::post('/register/step4/recap', [RegistrationController::class, 'Step4RegisterRecapPost'])->name('step4.register.recap.post');
Route::get('/register/fiche', [RegistrationController::class, 'Step5RegisterFiche'])->name('step5.registration.fiche');