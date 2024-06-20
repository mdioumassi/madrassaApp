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
     * route: /admin/courses
     * name: admin.courses.index
     */
    public function index()
    {
        $courses = Course::latest()->paginate(8);

        if ($courses->isEmpty()) {
            return redirect()->route('admin.courses.create');
        }

        return view('admin.courses.index', compact('courses'));
    }

    /**
     * route: /admin/courses/levels
     * name: admin.courses.levels.index
     */
    public function getLevelsByCourses()
    {
        $courses = Course::with('levels')->get();
        $levels = $courses->pluck('levels')->flatten();

        return view('admin.courses.levels.index', compact('levels'));
    }

    /**
     * route: /admin/courses/key/{keyword}/levels
     * name: admin.courses.select.levels.keyword
     */
    public function SelectLevelsByKeyword($keyword)
    {
        $course = Course::where('keywords', $keyword)->with('levels')->first();
        $levels = $course->levels;

        return view('admin.courses.types.'.$keyword, compact('levels'));
    }

    /**
     * route: /admin/courses/{id}/level/create
     * name: admin.courses.add.levels
     */
    public function createLevelsByCourses($id)
    {
         $course = Course::where('id', $id)->with('levels')->first();
            return view('admin.courses.levels.create', compact('course'));
    }

    /**
     * route: /admin/courses/key/{keyword}/level/create
     * name: admin.courses.levels.create
     */
    public function createLevelsByKeywords($keyword)
    {
         $course = Course::where('keywords', $keyword)->with('levels')->first();
            return view('admin.courses.levels.create', compact('course'));
    }

    /**
     * route: /admin/courses/{id}/level/list
     * name: admin.courses.levels.list
     */
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
