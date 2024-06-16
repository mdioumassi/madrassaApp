<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ChildStoreRequest;
use App\Http\Requests\ChildUpdateRequest;
use App\Models\Child;

class ChildController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $children = Child::latest()->paginate(10);

        return view('admin.children.index', compact('children'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('children.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ChildStoreRequest $request)
    {
        Child::create($request->validated());
        return redirect()->route('children.index')
                         ->with('success', 'Child created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Child $child)
    {
        return view('admin.children.show', compact('child'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Child $child)
    {
        return view('admin.children.edit', compact('child'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ChildUpdateRequest $request, Child $child)
    {
        $child->update($request->validated());
        return redirect()->route('children.index')
                         ->with('success', 'Child updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Child $child)
    {
        $child->delete();
        return redirect()->route('children.index')
                         ->with('success', 'Child deleted successfully.');
    }
}
