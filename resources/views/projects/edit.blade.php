<h1>Edit Project</h1>

<form action="{{ route('projects.update', $project->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div>
        <label for="name">Project Name:</label>
        <input type="text" name="name" id="name" value="{{ $project->name }}" required>
    </div>

    <button type="submit">Update Project</button>
</form>
