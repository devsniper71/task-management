<h1>Projects</h1>

@if ($projects->count() > 0)
    <ul>
        @foreach ($projects as $project)
            <li>
                <a href="{{ route('projects.index', ['project' => $project->id]) }}">{{ $project->name }}</a>
                <a href="{{ route('projects.edit', $project->id) }}">Edit</a>
                <form action="{{ route('projects.destroy', $project->id) }}" method="POST" style="display: inline-block;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Are you sure you want to delete this project?')">Delete</button>
                </form>
            </li>
        @endforeach
    </ul>
@else
    <p>No projects found.</p>
@endif

<hr>

<a href="{{ route('projects.create') }}">Create Project</a>
