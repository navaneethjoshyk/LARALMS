@extends('layouts.main')

@section('title', 'Edit Course')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h1 class="h4 mb-3">Edit Course</h1>

                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('courses.update', $course) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label class="form-label">Code</label>
                            <input type="text" name="code" class="form-control"
                                   value="{{ old('code', $course->code) }}">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Title</label>
                            <input type="text" name="title" class="form-control"
                                   value="{{ old('title', $course->title) }}">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Description</label>
                            <textarea name="description" class="form-control" rows="3">{{ old('description', $course->description) }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Credits</label>
                            <input type="number" name="credits" class="form-control"
                                   value="{{ old('credits', $course->credits) }}">
                        </div>

                        @php
                            $selectedProfessors = old('professors', $course->professors->pluck('id')->toArray());
                        @endphp

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
                                               @if(in_array($professor->id, $selectedProfessors)) checked @endif>
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
                                Back
                            </a>
                            <button type="submit" class="btn btn-primary">
                                Update Course
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
