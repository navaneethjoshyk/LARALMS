<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Course;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Eager load courses so you can show them if you want
        $students = Student::with('courses')->get();

        return view('students.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // All courses to show as checkboxes
        $courses = Course::all();

        return view('students.create', compact('courses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $data = $request->validate([
            'fname'      => 'required|string|max:255',
            'lname'      => 'required|string|max:255',
            'email'      => 'required|email|max:255|unique:students,email',
            'courses'    => 'array',
            'courses.*'  => 'integer|exists:courses,id',
        ]);

        
        $student = Student::create([
            'fname' => $data['fname'],
            'lname' => $data['lname'],
            'email' => $data['email'],
        ]);

        
        $student->courses()->sync($request->input('courses', []));

        return redirect()
            ->route('students.index')
            ->with('success', 'Student created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        $student->load('courses');

        return view('students.show', compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        $courses = Course::all();
        $student->load('courses');

        return view('students.edit', compact('student', 'courses'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        $data = $request->validate([
            'fname'      => 'required|string|max:255',
            'lname'      => 'required|string|max:255',
            'email'      => 'required|email|max:255|unique:students,email,' . $student->id,
            'courses'    => 'array',
            'courses.*'  => 'integer|exists:courses,id',
        ]);

        
        $student->update([
            'fname' => $data['fname'],
            'lname' => $data['lname'],
            'email' => $data['email'],
        ]);

        
        $student->courses()->sync($request->input('courses', []));

        return redirect()
            ->route('students.index')
            ->with('success', 'Student updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        
        $student->courses()->detach();

        
        $student->delete();

        return redirect()
            ->route('students.index')
            ->with('success', 'Student deleted successfully.');
    }
}
