<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Professor;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $courses = Course::with('professors')->get();

        return view('courses.index', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $professors = Professor::all();

        return view('courses.create', compact('professors'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'code'        => 'required|string|max:255',
            'title'       => 'required|string|max:255',
            'description' => 'nullable|string',
            'credits'     => 'required|integer|min:1|max:10',
            'professors'  => 'array',
            'professors.*'=> 'integer|exists:professors,id',
        ]);

        $course = Course::create([
            'code'        => $data['code'],
            'title'       => $data['title'],
            'description' => $data['description'] ?? null,
            'credits'     => $data['credits'],
        ]);

        // Assign selected professors
        $course->professors()->sync($request->input('professors', []));

        return redirect()
            ->route('courses.index')
            ->with('success', 'Course created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Course $course)
    {
        $professors = Professor::all();
        $course->load('professors');

        return view('courses.edit', compact('course', 'professors'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Course $course)
    {
        $data = $request->validate([
            'code'        => 'required|string|max:255',
            'title'       => 'required|string|max:255',
            'description' => 'nullable|string',
            'credits'     => 'required|integer|min:1|max:10',
            'professors'  => 'array',
            'professors.*'=> 'integer|exists:professors,id',
        ]);

        $course->update([
            'code'        => $data['code'],
            'title'       => $data['title'],
            'description' => $data['description'] ?? null,
            'credits'     => $data['credits'],
        ]);

        // Update assigned professors
        $course->professors()->sync($request->input('professors', []));

        return redirect()
            ->route('courses.index')
            ->with('success', 'Course updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course)
    {
        $course->professors()->detach();
        $course->students()->detach();
        $course->delete();

        return redirect()
            ->route('courses.index')
            ->with('success', 'Course deleted successfully.');
    }
}
