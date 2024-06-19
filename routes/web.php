<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ChildController;
use App\Http\Controllers\Admin\CourseCrudController;
use App\Http\Controllers\Admin\LevelCrudController;
use App\Http\Controllers\Admin\ParentCrudController;
use App\Http\Controllers\Admin\AdultCrudController;
use App\Http\Controllers\Admin\SubjectCrudController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Auth::routes();

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

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
    Route::prefix('courses')->group(function () {
        Route::get('/', [CourseCrudController::class, 'index'])->name('admin.courses.index');
        Route::get('/levels', [CourseCrudController::class, 'getLevelsByCourses'])->name('admin.courses.levels.index');
        Route::get('/create', [CourseCrudController::class, 'create'])->name('admin.courses.create');
        Route::post('/store', [CourseCrudController::class, 'store'])->name('admin.courses.store');
        Route::get('/{course}', [CourseCrudController::class, 'show'])->name('admin.courses.show');
        Route::get('/{course}/edit', [CourseCrudController::class, 'edit'])->name('admin.courses.edit');
        Route::put('/{course}', [CourseCrudController::class, 'update'])->name('admin.courses.update');
        Route::delete('/{course}', [CourseCrudController::class, 'destroy'])->name('admin.courses.destroy');
        Route::get('/{id}/level/list', [CourseCrudController::class, 'LevelsListByCourses'])->name('admin.courses.levels.list');
        Route::get('/{id}/level/create', [CourseCrudController::class, 'createLevelsByCourses'])->name('admin.courses.add.levels');
        Route::get('/key/{keyword}/level/create', [CourseCrudController::class, 'createLevelsByKeywords'])->name('admin.courses.levels.create');
        Route::get('/{keyword}/levels', [CourseCrudController::class, 'SelectLevelsByKeyword'])->name('admin.courses.select.levels.keyword');
    });
    Route::prefix('levels')->group(function () {
        // Route::get('/adult', [LevelCrudController::class, 'AdultLevels'])->name('admin.levels.adult');
        Route::get('/', [LevelCrudController::class, 'index'])->name('admin.levels.index');
        Route::get('/create', [LevelCrudController::class, 'create'])->name('admin.levels.create');
        Route::post('/course/{id}/level/store', [LevelCrudController::class, 'storeLevelCourse'])->name('admin.courses.levels.store');
        Route::post('/course/keyword/{keyword}/level/store', [LevelCrudController::class, 'storeLevelByCourseKeywords'])->name('admin.courses.keywords.levels.store');
        Route::get('/{level}', [LevelCrudController::class, 'show'])->name('admin.levels.show');
        Route::get('/{level}/edit', [LevelCrudController::class, 'edit'])->name('admin.levels.edit');
        Route::put('/{level}', [LevelCrudController::class, 'update'])->name('admin.levels.update');
        Route::delete('/{level}', [LevelCrudController::class, 'destroy'])->name('admin.levels.destroy');
    });
    Route::prefix('subjects')->group(function () {
        Route::get('/levels/{id}/subjets', [SubjectCrudController::class, 'index'])->name('admin.levels.subjects.index');
        Route::get('/level/{id}/subject/create', [SubjectCrudController::class, 'createLevelSubject'])->name('admin.subjects.create');
        Route::post('/level/{id}/subject/store', [SubjectCrudController::class, 'storeLevelSubject'])->name('admin.levels.subjects.store');
        Route::get('/{subject}', [SubjectCrudController::class, 'show'])->name('admin.subjects.show');
        Route::get('/{subject}/edit', [SubjectCrudController::class, 'edit'])->name('admin.subjects.edit');
        Route::put('/{subject}', [SubjectCrudController::class, 'update'])->name('admin.subjects.update');
        Route::delete('/{subject}', [SubjectCrudController::class, 'destroy'])->name('admin.subjects.destroy');
    });

    Route::get('/levels/{id}/subjects', [LevelCrudController::class, 'subjectsList'])->name('level.subjects');
    Route::get('/parents', [ParentCrudController::class, 'list'])->name('admin.parents.list');
    Route::get('/parents/{id}/children', [ParentCrudController::class, 'childsList'])->name('parent.children');
    Route::get('/adults', [AdultCrudController::class, 'list'])->name('admin.students.list');
});
