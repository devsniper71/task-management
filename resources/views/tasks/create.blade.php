<h1>Create Task</h1>

<form action="{{ route('tasks.store') }}" method="POST">
    @csrf

    <div>
        <label for="name">Task Name:</label>
        <input type="text" name="name" id="name" required>
    </div>

    <div>
        <label for="priority">Priority:</label>
        <input type="number" name="priority" id="priority" required>
    </div>

    <div>
        <label for="project_id">Project:</label>
        <select name="project_id" id="project_id">
            <option value="">None</option>
            @foreach ($projects as $project)
                <option value="{{ $project->id }}">{{ $project->name }}</option>
            @endforeach
        </select>
    </div>

    <button type="submit">Create Task</button>
</form>
