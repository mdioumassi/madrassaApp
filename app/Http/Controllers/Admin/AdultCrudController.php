<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AdultCrudController extends Controller
{
   /**
    * route: /admin/adults
    * name: admin.adults.index
    */
    public function list()
    {
        $users = User::where('type', 'etudiant(e)')->latest()->paginate(10);

        return view('admin.users.adults.list', compact('users'));
    }
}
