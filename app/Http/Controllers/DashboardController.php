<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    /**
     * route: /dashboard
     * name: dashboard
     */
    public function index()
    {
        $users = User::all();
        $parents = User::where('type', 'parent')->get();
        $adultes = User::where('type', 'adulte')->get();
        $teachers = User::where('type', 'professeur')->get();

        return view('dashboard.index', compact('users', 'parents', 'adultes', 'teachers'));
    }

    /**
     * route: /dashboard/course-and-levels
     * name: dashboard.course-and-levels
     */
    public function CoursesAndLevels()
    {
        $courses = Course::all();
        return view('dashboard.courses-and-levels', compact('courses'));
    }


}
