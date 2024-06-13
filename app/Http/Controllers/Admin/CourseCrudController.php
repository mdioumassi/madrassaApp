<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CourseStoreRequest;
use App\Http\Requests\CourseUpdateRequest;
use App\Models\Course;
use Illuminate\Support\Str;

class CourseCrudController extends Controller
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
        $courses = Course::latest()->paginate(5);

        if ($courses->isEmpty()) {
            return redirect()->route('admin.courses.create');
        }

        return view('admin.courses.index', compact('courses'));
    }

    public function getLevelsByCourses()
    {
        $courses = Course::with('levels')->get();
        $levels = $courses->pluck('levels')->flatten();

        return view('admin.courses.levels.index', compact('levels'));
    }

    public function SelectLevelsByCourse($id)
    {
        $course = Course::where('id', $id)->with('levels')->first();
        $levels = $course->levels;
        $courses = Course::with('levels')->get();

        if ($levels->isEmpty()) {
            return redirect()->route('admin.courses.index')
                             ->with('warning', 'No levels found for this course.');
        }

        return view('admin.levels.index', compact('levels', 'courses'));
    }

    public function createLevelsByCourses($id)
    {
         $course = Course::where('id', $id)->with('levels')->first();
            return view('admin.courses.levels.create', compact('course'));
    }

    public function LevelsListByCourses($id)
    {
        $course = Course::where('id', $id)->with('levels')->first();
        $levels = $course->levels;
        if ($levels->isEmpty()) {
            return redirect()->route('admin.courses.index')
                             ->with('warning', 'No levels found for this course.');
        }

        return view('admin.courses.levels.list', compact('levels', 'course'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.courses.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CourseStoreRequest $request)
    {
        $validatedData = $request->validated();
        $validatedData['slug'] = Str::slug($validatedData['slug'], '-');

        Course::create($validatedData);
        return redirect()->route('admin.courses.index')
                         ->with('success', 'Course created successfully.');

    }

    /**
     * Display the specified resource.
     */
    public function show(Course $course)
    {
        return view('admin.courses.show', compact('course'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Course $course)
    {
        return view('admin.courses.edit', compact('course'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CourseUpdateRequest $request, Course $course)
    {
        $validatedData = $request->validated();
        $validatedData['slug'] = Str::slug($validatedData['slug'], '-');

        $course->update($validatedData);
        return redirect()->route('admin.courses.index')
                         ->with('success', 'Course updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course)
    {
        $course->delete();
        return redirect()->route('admin.courses.index')
                         ->with('success', 'Course deleted successfully.');
    }
}
