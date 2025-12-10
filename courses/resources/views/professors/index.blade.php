@extends('layouts.main')

@section('title', 'Professors')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="h3 mb-0">Professors</h1>
        <a href="{{ route('professors.create') }}" class="btn btn-warning">
            + Add Professor
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($professors->isEmpty())
        <div class="alert alert-info">
            No professors found. Click <strong>“Add Professor”</strong> to create one.
        </div>
    @else
        <div class="card shadow-sm">
            <div class="card-body p-0">
                <table class="table table-striped mb-0">
                    <thead class="table-light">
                    <tr>
                        <th>ID</th>
                        <th>First name</th>
                        <th>Last name</th>
                        <th>Email</th>
                        <th>Department</th>
                        <th style="width: 160px;">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($professors as $professor)
                        <tr>
                            <td>{{ $professor->id }}</td>
                            <td>{{ $professor->fname }}</td>
                            <td>{{ $professor->lname }}</td>
                            <td>{{ $professor->email }}</td>
                            <td>{{ $professor->department }}</td>
                            <td>
                                <a href="{{ route('professors.edit', $professor) }}"
                                   class="btn btn-sm btn-outline-primary">
                                    Edit
                                </a>
                                <form action="{{ route('professors.destroy', $professor) }}"
                                      method="POST"
                                      class="d-inline"
                                      onsubmit="return confirm('Delete this professor?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-outline-danger">
                                        Del
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif
@endsection
