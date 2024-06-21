<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Child;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ParentCrudController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * route:  admin.parents.index
     * name:   admin.parents.list
     */
    public function list()
    {
        $users = User::where('type', 'parent')->latest()->paginate(8);
        
        return view('admin.users.parents.list', compact('users'));
    }

    public function childsList($id)
    {
       $parent = User::where('id', $id)->with('children')->first();
       $children = $parent->children;
        
        return view('admin.users.parents.children', compact('children', 'parent'));
    }
}
