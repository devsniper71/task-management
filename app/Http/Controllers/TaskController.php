<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
use App\Models\Project;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of tasks.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Get tasks ordered by priority
        $tasks = Task::orderBy('priority')->get();
        // Get all projects
        $projects = Project::all();

        // Check if $projects is null or empty
        if ($projects->isEmpty()) {
            return redirect()->route('projects.create');
        }

        // Return view with tasks and projects data
        return view('tasks.index', compact('tasks', 'projects'));
    }

    /**
     * Show the form for creating a new task.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        // Get all projects
        $projects = Project::all();

        // Return view with projects data
        return view('tasks.create', compact('projects'));
    }

    /**
     * Store a newly created task in storage.
     *
     * @param \App\Http\Requests\TaskRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(TaskRequest $request)
    {
        // Create a new task with the validated data
        $task = Task::create($request->validated());

        // Redirect to the index page with a success message
        return redirect()->route('tasks.index')->with('success', 'Task created successfully.');
    }

    /**
     * Show the form for editing the specified task.
     *
     * @param \App\Models\Task $task
     * @return \Illuminate\View\View
     */
    public function edit(Task $task)
    {
        // Get all projects
        $projects = Project::all();

        // Return view with task and projects data
        return view('tasks.edit', compact('task', 'projects'));
    }

    /**
     * Update the specified task in storage.
     *
     * @param \App\Http\Requests\TaskRequest $request
     * @param \App\Models\Task $task
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(TaskRequest $request, Task $task)
    {
        // Update the task with the validated data
        $task->update($request->validated());

        // Redirect to the index page with a success message
        return redirect()->route('tasks.index')->with('success', 'Task updated successfully.');
    }

    /**
     * Remove the specified task from storage.
     *
     * @param \App\Models\Task $task
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Task $task)
    {
        // Delete the task
        $task->delete();

        // Redirect to the index page with a success message
        return redirect()->route('tasks.index')->with('success', 'Task deleted successfully.');
    }

    /**
     * Reorder the tasks based on the given task IDs.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function reorder(Request $request)
    {
        // Get the task IDs from the request input
        $taskIds = $request->input('taskIds', []);

        // Update the priority of tasks based on the given order
        foreach ($taskIds as $index => $taskId) {
            Task::where('id', $taskId)->update(['priority' => $index + 1]);
        }

        // Return a JSON response indicating success
        return response()->json(['success' => true]);
    }
}
