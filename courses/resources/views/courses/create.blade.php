@extends('layouts.main')

@section('title', 'Add Course')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h1 class="h4 mb-3">Add Course</h1>

                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('courses.store') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label">Code</label>
                            <input type="text" name="code" class="form-control"
                                   value="{{ old('code') }}">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Title</label>
                            <input type="text" name="title" class="form-control"
                                   value="{{ old('title') }}">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Description</label>
                            <textarea name="description" class="form-control" rows="3">{{ old('description') }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Credits</label>
                            <input type="number" name="credits" class="form-control"
                                   value="{{ old('credits', 3) }}">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Professors teaching this course</label>

                            @if(isset($professors) && $professors->isNotEmpty())
                                @foreach($professors as $professor)
                                    <div class="form-check">
                                        <input class="form-check-input"
                                               type="checkbox"
                                               name="professors[]"
                                               value="{{ $professor->id }}"
                                               id="prof-{{ $professor->id }}"
                                               @if(in_array($professor->id, old('professors', []))) checked @endif>
                                        <label class="form-check-label" for="prof-{{ $professor->id }}">
                                            {{ $professor->fname }} {{ $professor->lname }}
                                        </label>
                                    </div>
                                @endforeach
                            @else
                                <p class="text-muted mb-0">No professors available yet.</p>
                            @endif
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="{{ route('courses.index') }}" class="btn btn-outline-secondary">
                                Cancel
                            </a>
                            <button type="submit" class="btn btn-primary">
                                Save Course
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
