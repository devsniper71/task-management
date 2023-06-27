@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Tasks</h1>

        @include('layouts.alert')

        <div class="row">
            <div class="col-md-6">
                <h2>Create Task</h2>

                <form action="{{ route('tasks.store') }}" method="POST">
                    @csrf

                    <div class="form-group">
                        <label for="name">Task Name:</label>
                        <input type="text" name="name" id="name" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="priority">Priority:</label>
                        <input type="number" name="priority" id="priority" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="project_id">Project:</label>
                        <select name="project_id" id="project_id" class="form-control">
                            <option value="">None</option>
                            @foreach ($projects as $project)
                                <option value="{{ $project->id }}">{{ $project->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <hr>

                    <button type="submit" class="btn btn-primary">Create Task</button>
                </form>
            </div>

            <div class="col-md-6">
                <h2>Existing Tasks</h2>

                @if ($tasks->count() > 0)
                    <ul id="task-list" class="list-group sortable">
                        @foreach ($tasks as $task)
                            <li class="list-group-item" data-task-id="{{ $task->id }}">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        {{ $task->name }} (Priority: {{ $task->priority }}) - {{ $task->project->name }}
                                    </div>
                                    <div>
                                        <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                        <form action="{{ route('tasks.destroy', $task->id) }}" method="POST"
                                              style="display: inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger"
                                                    onclick="return confirm('Are you sure you want to delete this task?')">
                                                Delete
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                @else
                    <p>No tasks found.</p>
                @endif
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"
            integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js"
            integrity="sha256-lSjKY0/srUM9BE3dPm+c4fBo1dky2v27Gdjm2uoZaL0=" crossorigin="anonymous"></script>
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
                            window.location.reload();
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

@push('styles')
    <style>
        .sortable {
            cursor: move;
        }

        .list-group-item {
            padding: 12px 16px;
            margin-bottom: 8px;
            background-color: #f8f9fa;
            border: 1px solid #dee2e6;
            border-radius: .25rem;
        }

        .list-group-item:hover {
            background-color: #e9ecef;
        }

        .list-group-item .d-flex {
            align-items: center;
        }

        .list-group-item .d-flex > div:first-child {
            flex-grow: 1;
        }

        .list-group-item .btn {
            margin-left: 8px;
        }
    </style>
@endpush
