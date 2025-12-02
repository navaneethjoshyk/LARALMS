<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use App\Models\Student;
use Illuminate\Support\Facades\Session;

class StudentController extends Controller
{
    public function index()
    {
        return view('students.index', [
            'students' => Student::all()
        ]);
    }

    public function create()
    {
        return view('students.create');
    }

    public function store(StoreStudentRequest $request)
    {
        Student::create($request->validated());

        Session::flash('success', 'Student added successfully');

        return redirect()->route('students.index');
    }

    public function show(Student $student)
    {
        return view('students.show', compact('student'));
    }

    public function edit(Student $student)
    {
        return view('students.edit', compact('student'));
    }

    public function update(UpdateStudentRequest $request, Student $student)
    {
        $student->update($request->validated());

        Session::flash('success', 'Student updated successfully');

        return redirect()->route('students.index');
    }

    public function trash($id)
    {
        Student::destroy($id);

        Session::flash('success', 'Student trashed successfully');

        return redirect()->route('students.index');
    }

    public function destroy($id)
    {
        $student = Student::withTrashed()->where('id', $id)->first();
        $student->forceDelete();

        Session::flash('success', 'Student deleted successfully');

        return redirect()->route('students.index');
    }

    public function restore($id)
    {
        $student = Student::withTrashed()->where('id', $id)->first();
        $student->restore();

        Session::flash('success', 'Student restored successfully');

        return redirect()->route('students.trashed');
    }
}
