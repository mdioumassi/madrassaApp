<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Child;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
       $parent = User::where('id', $id)->with('children')->first();
       $children = $parent->children;
        
        return view('admin.users.parents.children', compact('children', 'parent'));
    }

    public function addChild($parent_id)
    {
    

    }
}
