@extends('layouts.main')

@section('title', 'Add Professor')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h1 class="h4 mb-3">Add Professor</h1>

                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('professors.store') }}" method="POST">
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
                            <label class="form-label">Department</label>
                            <input type="text" name="department" class="form-control"
                                   value="{{ old('department') }}">
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="{{ route('professors.index') }}" class="btn btn-outline-secondary">
                                Cancel
                            </a>
                            <button type="submit" class="btn btn-warning">
                                Save Professor
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
