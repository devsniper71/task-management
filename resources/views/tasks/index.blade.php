<h1>Tasks</h1>

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<h2>Create Task</h2>

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

<hr>

<h2>Existing Tasks</h2>

@if ($tasks->count() > 0)
    <ul id="task-list">
        @foreach ($tasks as $task)
            <li data-task-id="{{ $task->id }}">
                {{ $task->name }} (Priority: {{ $task->priority }}) - {{ $task->project->name }}
                <a href="{{ route('tasks.edit', $task->id) }}">Edit</a>
                <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display: inline-block;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Are you sure you want to delete this task?')">
                        Delete
                    </button>
                </form>
            </li>
        @endforeach
    </ul>
@else
    <p>No tasks found.</p>
@endif

<hr>

<a href="{{ route('projects.index') }}">Projects</a>

@push('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jqueryui.com/jquery-ui-1.12.1.min.js"></script>
    <script>
        $(function () {
            $("#task-list").sortable({
                update: function (event, ui) {
                    var taskIds = [];

                    $("#task-list li").each(function () {
                        taskIds.push($(this).data('task-id'));
                    });

                    $.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});

                    $.ajax({
                        url: "{{ route('tasks.reorder') }}",
                        method: "PUT",
                        data: {taskIds: taskIds},
                        success: function (response) {
                            console.log(response);
                        },
                        error: function (xhr, status, error) {
                            console.log(xhr.responseText);
                        }
                    });
                }
            });
        });
    </script>
@endpush
