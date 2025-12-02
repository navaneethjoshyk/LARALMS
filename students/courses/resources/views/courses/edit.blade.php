@extends('layouts.courses')

@section('content')
    <h1>Edit Course</h1>

    @if($errors->any())
        <div class="alert alert-danger mt-2">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('courses.update', $course->id) }}">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Course Name</label>
            <input type="text" name="name" class="form-control"
                   value="{{ old('name', $course->name) }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea name="description" class="form-control">
                {{ old('description', $course->description) }}
            </textarea>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('courses.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
@endsection
