@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Projects</h1>
        <div class="card">
            <div class="card-body">
                @if ($projects->count() > 0)
                    <ul class="list-group">
                        @foreach ($projects as $project)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <div>
                                    {{ $project->name }}
                                </div>
                                <div>
                                    <a href="{{ route('projects.edit', $project->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                    <form action="{{ route('projects.destroy', $project->id) }}" method="POST"
                                          style="display: inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm"
                                                onclick="return confirm('Are you sure you want to delete this project?')">
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                @else
                    <p>No projects found.</p>
                @endif
            </div>
        </div>

        <hr>

        <a href="{{ route('projects.create') }}" class="btn btn-primary">Create Project</a>
    </div>
@endsection
