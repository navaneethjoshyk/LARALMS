<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       return view('students.index', [
        'students' => Student::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('students.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStudentRequest $request)
    {
        student::create($request->validated());
        session()->flash('student-created-message', 'Student ' . $request->fname . ' ' . $request->lname . ' created successfully!');
        return redirect()->route('students.index');    
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        return view('students.show', compact('student')
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        return view('students.edit', compact('student'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStudentRequest $request, Student $student)
    {
        $student->update($request->validated());
        session()->flash('student-updated-message', 'Student ' . $request->fname . ' ' . $request->lname . ' updated successfully!');
        return redirect()->route('students.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        $student = Student::withTrashed() -> where('id', $id) -> first();
        $student -> forceDelete();
        Session::Flash('success', 'Student deleted successfully');
        return redirect() -> route('students.index');
    }
}
