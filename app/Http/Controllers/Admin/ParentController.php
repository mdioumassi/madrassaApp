<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class ParentController extends Controller
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
        $parents = User::where('type', 'parent')->latest()->paginate(8);
        
        return view('admin.users.parents.list', compact('parents'));
    }

    public function childsList($id)
    {
       $parent = User::where('id', $id)->with('childs')->first();
       $childs = $parent->childs;
        
        return view('admin.users.parents.childs', compact('childs', 'parent'));
    }
}
