<?php

namespace App\Http\Controllers\BackendController;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the courses.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Get all courses ordered by latest first and paginate
        $courses = Course::orderBy('id', 'desc')->paginate(10);
        return view('courses.index', compact('courses'));
    }

    /**
     * Show the form for creating a new course.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        // Get all active categories to populate dropdown
        $categories = Category::where('status', 1)->get();
        return view('courses.create', compact('categories'));
    }

    /**
     * Store a newly created course in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // Validate course input data
        $request->validate([
            'title' => 'required|string|max:160',
            'description' => 'required|string|max:255',
            'category_id' => 'required',
            'duration' => 'required|integer',
        ]);

        // Create and save the new course
        $course = new Course();
        $course->title = $request->title;
        $course->description = $request->description;
        $course->category_id = $request->category_id;
        $course->duration = $request->duration;
        $course->save();

        return redirect()->route('courses.index')
            ->with('message', 'Course Added Successfully')
            ->with('status', asset('assets/icon/success.gif'));
    }

    /**
     * Display the specified course.
     *
     * @param  string  $id
     * @return \Illuminate\View\View
     */
    public function show(string $id)
    {
        // Find the course and get categories for display
        $course = Course::find($id);
        $categories = Category::where('status', 1)->get();
        return view('courses.show', compact('course', 'categories'));
    }

    /**
     * Show the form for editing the specified course.
     *
     * @param  string  $id
     * @return \Illuminate\View\View
     */
    public function edit(string $id)
    {
        // Find course and categories for edit form
        $course = Course::find($id);
        $categories = Category::where('status', 1)->get();
        return view('courses.edit', compact('course', 'categories'));
    }

    /**
     * Update the specified course in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, string $id)
    {
        // Find and update the course
        $course = Course::find($id);
        $course->title = $request->title;
        $course->description = $request->description;
        $course->category_id = $request->category_id;
        $course->duration = $request->duration;
        $course->save();

        return redirect()->route('courses.index')
            ->with('message', 'Course Updated Successfully')
            ->with('status', asset('assets/icon/success.gif'));
    }

    /**
     * Remove the specified course from storage.
     *
     * @param  string  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(string $id)
    {
        // Delete the course
        $course = Course::find($id);
        $course->delete();

        return redirect()->route('courses.index')
            ->with('message', 'Course Deleted Successfully')
            ->with('status', asset('assets/icon/delete.gif'));
    }

    /**
     * Toggle the status (active/inactive) of the specified course.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function changeStatus($id)
    {
        // Toggle the course's status
        $course = Course::findOrFail($id);
        $course->status = $course->status == 1 ? 0 : 1;

        $message = $course->status == 1
            ? 'Status Activated Successfully!'
            : 'Status Inactivated!!!';

        $course->save();

        return back()->with('message', $message)
            ->with('status', asset('assets/icon/success.gif'));
    }
}
