<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Level;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class SubjectCrudController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        $level = Level::where('id', $id)->with('subjects')->first();
        $subjects = $level->subjects;
        if ($subjects->isEmpty()) {
            return redirect()->route('admin.levels.index')
                             ->with('warning', 'No subjects found for this level.');
        }

        return view('admin.levels.subjects.index', compact('subjects', 'level'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function createLevelSubject($id)
    {
        $level = Level::where('id', $id)->first();
        return view('admin.levels.subjects.create', compact('level'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function storeLevelSubject(Request $request, $id)
    {
        $level = Level::where('id', $id)->first();
        $request->validate([
            'label' => 'required|string|max:255'
        ]);
        $level->subjects()->create($request->all());
        return redirect()->route('admin.levels.subjects.index', $level->id)
                         ->with('success', 'Subject created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Subject $subject)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Subject $subject)
    {

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Subject $subject)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Subject $subject)
    {
        //
    }
}
