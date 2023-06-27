<h1>Create Project</h1>

<form action="{{ route('projects.store') }}" method="POST">
    @csrf

    <div>
        <label for="name">Project Name:</label>
        <input type="text" name="name" id="name" required>
    </div>

    <button type="submit">Create Project</button>
</form>
