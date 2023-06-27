<h1>Edit Task</h1>

<form action="{{ route('tasks.update', $task->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div>
        <label for="name">Task Name:</label>
        <input type="text" name="name" id="name" value="{{ $task->name }}" required>
    </div>

    <div>
        <label for="priority">Priority:</label>
        <input type="number" name="priority" id="priority" value="{{ $task->priority }}" required>
    </div>

    <div>
        <label for="project_id">Project:</label>
        <select name="project_id" id="project_id">
            <option value="">None</option>
            @foreach ($projects as $project)
                <option value="{{ $project->id }}" {{ $project->id == $task->project_id ? 'selected' : '' }}>
                    {{ $project->name }}
                </option>
            @endforeach
        </select>
    </div>

    <button type="submit">Update Task</button>
</form>
