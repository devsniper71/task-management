@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Create Project</h1>

        @include('layouts.alert')

        <div class="card">
            <div class="card-body">
                <form action="{{ route('projects.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name">Project Name:</label>
                        <input type="text" name="name" id="name" class="form-control" required>
                    </div>

                    <hr>

                    <button type="submit" class="btn btn-primary">Create Project</button>
                </form>
            </div>
        </div>

        <a href="{{ route('tasks.index') }}" class="btn btn-secondary mt-3">Back</a>
    </div>
@endsection
