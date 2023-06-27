@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Project</h1>

        @include('layouts.alert')

        <div class="card">
            <div class="card-body">
                <form action="{{ route('projects.update', $project->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="name">Project Name:</label>
                        <input type="text" name="name" id="name" value="{{ $project->name }}" class="form-control"
                               required>
                    </div>

                    <hr>

                    <button type="submit" class="btn btn-primary">Update Project</button>
                </form>
            </div>
        </div>
        <a href="{{ route('projects.index') }}" class="btn btn-secondary mt-3">Back</a>
    </div>
@endsection
