@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Task</h1>

        <form action="{{ route('tasks.update', $task->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name">Task Name:</label>
                <input type="text" name="name" id="name" value="{{ $task->name }}" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="priority">Priority:</label>
                <input type="number" name="priority" id="priority" value="{{ $task->priority }}" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="project_id">Project:</label>
                <select name="project_id" id="project_id" class="form-control">
                    <option value="">None</option>
                    @foreach ($projects as $project)
                        <option value="{{ $project->id }}" {{ $project->id == $task->project_id ? 'selected' : '' }}>
                            {{ $project->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <hr>

            <button type="submit" class="btn btn-primary">Update Task</button>
            <a href="{{ route('tasks.index') }}" class="btn btn-secondary">Back</a>
        </form>
    </div>
@endsection
