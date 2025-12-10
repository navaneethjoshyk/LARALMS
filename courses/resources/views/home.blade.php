@extends('layouts.main')

@section('title', 'Home')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="text-center mb-4">
                <h1 class="mb-3">Student & Course Management</h1>
                <p class="text-muted">
                    Choose what you’d like to manage: students or courses.
                </p>
            </div>

            <div class="row g-4">
                <div class="col-md-6">
                    <div class="card shadow-sm h-100">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">Students</h5>
                            <p class="card-text flex-grow-1">
                                View, add, and edit student records including name and email.
                            </p>
                            <a href="{{ route('students.index') }}" class="btn btn-primary mt-auto">
                                Manage Students
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card shadow-sm h-100">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">Courses</h5>
                            <p class="card-text flex-grow-1">
                                Manage courses, their codes, credits, and descriptions.
                            </p>
                            <a href="{{ route('courses.index') }}" class="btn btn-success mt-auto">
                                Manage Courses
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
