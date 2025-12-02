@extends('layouts.courses')

@section('content')
    <h1>Courses</h1>

    @if(session('success'))
        <div class="alert alert-success mt-2">
            {{ session('success') }}
        </div>
    @endif

    <p>
        <a href="{{ route('courses.create') }}" class="btn btn-primary">
            + Add Course
        </a>
    </p>

    @if($courses->isEmpty())
        <p>No courses yet.</p>
    @else
        <table class="table table-bordered mt-3">
            <thead>
            <tr>
                <th>ID</th>
                <th>Course Name</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($courses as $course)
                <tr>
                    <td>{{ $course->id }}</td>
                    <td>{{ $course->name }}</td>
                    <td>{{ $course->description }}</td>
                    <td>
                        <a href="{{ route('courses.edit', $course->id) }}" class="btn btn-sm btn-warning">
                            Edit
                        </a>
                        <a href="{{ route('courses.trash', $course->id) }}" class="btn btn-sm btn-danger"
                           onclick="return confirm('Move this course to trash?')">
                            Trash
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @endif
@endsection
