<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class AdultCrudController extends Controller
{
   /**
    * route: /admin/adults
    * name: admin.adults.index
    */
    public function list()
    {
        $users = User::where('type', 'adulte')->latest()->paginate(10);
        $roles = Role::pluck('name', 'name')->all();

        return view('admin.users.adults.list', compact('users', 'roles'));
    }
}
