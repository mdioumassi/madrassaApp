<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\LevelStoreRequest;
use App\Http\Requests\LevelUpdateRequest;
use App\Models\Course;
use App\Models\Level;
use Illuminate\Support\Str;

class LevelCrudController extends Controller
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
        $levels = Level::all();

        $courses = Course::all();

        return view('admin.levels.index', compact('levels', 'courses'));
    }

    public function subjectsList($id)
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
    public function create()
    {
        return view('admin.levels.create');
    }

    public function storeLevelCourse(LevelStoreRequest $request, $id)
    {
        $course = Course::where('id', $id)->first();
        $validatedData = $request->validated();
        $validatedData['slug'] = Str::slug($validatedData['slug'], '-');
        $course->levels()->create($validatedData);
        
        return redirect()->route('admin.courses.levels.list', $course->id)
                         ->with('success', 'Level created successfully.');
    }

    /**
     * admin.courses.keywords.levels.store
     */
    public function storeLevelByCourseKeywords(LevelStoreRequest $request, $keyword)
    {
        $course = Course::where('keywords', $keyword)->first();
        $validatedData = $request->validated();
        $course->levels()->create($validatedData);
        
        return redirect()->route('admin.courses.select.levels.keyword', $keyword)
                         ->with('success', 'Level created successfully.');
    }
                
    /**
     * Display the specified resource.
     */
    public function show(Level $level)
    {
        return view('admin.levels.show', compact('level'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Level $level)
    {
        return view('admin.levels.edit', compact('level'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(LevelUpdateRequest $request, Level $level)
    {
        $validatedData = $request->validated();
        $level->update($validatedData);
        return redirect()->route('admin.levels.index')
                         ->with('success', 'Level updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Level $level)
    {
        $level->delete();

        return redirect()->route('admin.levels.index')
                         ->with('success', 'Level deleted successfully.');
    }

    public function AdultLevels()
    {
        $levels = Level::where('label', 'adult')->get();

        return view('admin.levels.adult', compact('levels'));
    }
}
