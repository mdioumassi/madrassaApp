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
     * route: /admin/levels/course/{id}/store
     * name: admin.levels.subjects.store
     * method: post
     */
    public function storeLevelSubject(Request $request, $id)
    {
        $userId = $request['userId'];

        $grille = $request['grilleTeacher'];
        $level = Level::where('id', $id)->first();
        $request->validate([
            'label' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);
        $level->subjects()->create($request->all());

        if($userId && $grille) {
            return redirect()->route('admin.teachers.levels.grille', $userId)
                             ->with('success', 'Subject created successfully.');
        } else if($userId){
            return redirect()->route('admin.teachers.levels.list', $userId)
                             ->with('success', 'Subject created successfully.');
        } else {
            return redirect()->route('admin.levels.subjects.index', $level->id)
                             ->with('success', 'Subject created successfully.');
        }
        
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
