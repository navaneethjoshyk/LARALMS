@extends('layouts.courses') {{-- use whatever layout filename you made --}}

@section('content')
    <h1>Create Course</h1>

    @if($errors->any())
        <div class="alert alert-danger mt-2">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('courses.store') }}">
        @csrf

        <div class="mb-3">
            <label class="form-label">Course Name</label>
            <input type="text" name="name" class="form-control" value="{{ old('name') }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea name="description" class="form-control">{{ old('description') }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Save</button>
        <a href="{{ route('courses.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
@endsection
