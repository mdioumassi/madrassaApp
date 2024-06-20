<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;

class TeacherCrudController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     */
    public function list()
    {
        $users = User::where('type', 'etudiant(e)')->latest()->paginate(10);

        return view('admin.users.teachers.list', compact('users'));
    }
}
