<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ChildController;
use App\Http\Controllers\Admin\EnfantController;
use App\Http\Controllers\Admin\EtudiantController;
use App\Http\Controllers\Admin\ParentController;
use App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\Admin\UserController;
use App\Models\Enfant;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Auth::routes();

Route::prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.index');
    Route::prefix('users')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('admin.users.index');
        Route::get('/create', [UserController::class, 'create'])->name('admin.users.create');
        Route::post('/store', [UserController::class, 'store'])->name('admin.users.store');
        Route::get('/{user}', [UserController::class, 'show'])->name('admin.users.show');
        Route::get('/{user}/edit', [UserController::class, 'edit'])->name('admin.users.edit');
        Route::put('/{user}', [UserController::class, 'update'])->name('admin.users.update');
        Route::delete('/{user}', [UserController::class, 'destroy'])->name('admin.users.destroy');
    });
    Route::get('/parents', [ParentController::class, 'list'])->name('admin.parents.list');
    Route::get('/parents/{id}/childs', [ParentController::class, 'childsList'])->name('parent.childs');
    Route::get('/students', [StudentController::class, 'list'])->name('admin.students.list');
    Route::resource('childs', ChildController::class);
});
