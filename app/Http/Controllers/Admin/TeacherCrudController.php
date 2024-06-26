<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Spatie\Permission\Models\Role;

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
        $users = User::where('type', 'professeur')->latest()->paginate(10);
        $roles = Role::pluck('name', 'name')->all();

        return view('admin.users.teachers.list', compact('users', 'roles'));
    }
}
