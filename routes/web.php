<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ChildController;
use App\Http\Controllers\Admin\ParentController;
use App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\Admin\UserController;
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
    Route::prefix('children')->group(function () {
        Route::get('/', [ChildController::class, 'index'])->name('children.index');
        Route::get('/create', [ChildController::class, 'create'])->name('children.create');
        Route::post('/store', [ChildController::class, 'store'])->name('children.store');
        Route::get('/{child}', [ChildController::class, 'show'])->name('children.show');
        Route::get('/{child}/edit', [ChildController::class, 'edit'])->name('children.edit');
        Route::put('/{child}', [ChildController::class, 'update'])->name('children.update');
        Route::delete('/{child}', [ChildController::class, 'destroy'])->name('children.destroy');
    });
    Route::get('/parents', [ParentController::class, 'list'])->name('admin.parents.list');
    Route::get('/parents/{id}/children', [ParentController::class, 'childsList'])->name('parent.children');
    Route::get('/students', [StudentController::class, 'list'])->name('admin.students.list');
  //  Route::resource('children', ChildController::class);
    //Route::get('/children/create/{parent_id}', [ChildController::class, 'create'])->name('parent.children.create');
});
