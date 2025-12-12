@extends('layouts.main')

@section('title', 'Add Student')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h1 class="h4 mb-3">Add Student</h1>

                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('students.store') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label">First name</label>
                            <input type="text" name="fname" class="form-control"
                                   value="{{ old('fname') }}">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Last name</label>
                            <input type="text" name="lname" class="form-control"
                                   value="{{ old('lname') }}">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" class="form-control"
                                   value="{{ old('email') }}">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Courses</label>

                            @if(isset($courses) && $courses->isNotEmpty())
                                @foreach($courses as $course)
                                    <div class="form-check">
                                        <input class="form-check-input"
                                               type="checkbox"
                                               name="courses[]"
                                               value="{{ $course->id }}"
                                               id="course-{{ $course->id }}">
                                        <label class="form-check-label" for="course-{{ $course->id }}">
                                            {{ $course->code }} – {{ $course->title }}
                                        </label>
                                    </div>
                                @endforeach
                            @else
                                <p class="text-muted mb-0">No courses available yet.</p>
                            @endif
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="{{ route('students.index') }}" class="btn btn-outline-secondary">
                                Cancel
                            </a>
                            <button type="submit" class="btn btn-primary">
                                Save Student
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
