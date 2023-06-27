<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProjectRequest;
use App\Models\Project;

class ProjectController extends Controller
{
    /**
     * Display a listing of the projects.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $projects = Project::all();

        return view('projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new project.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('projects.create');
    }

    /**
     * Store a newly created project in storage.
     *
     * @param \App\Http\Requests\ProjectRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(ProjectRequest $request)
    {
        $validatedData = $request->validated();

        $project = Project::create($validatedData);

        return redirect()->route('projects.index')->with('success', 'Project created successfully.');
    }

    /**
     * Show the form for editing the specified project.
     *
     * @param \App\Models\Project $project
     * @return \Illuminate\View\View
     */
    public function edit(Project $project)
    {
        return view('projects.edit', compact('project'));
    }

    /**
     * Update the specified project in storage.
     *
     * @param \App\Http\Requests\ProjectRequest $request
     * @param \App\Models\Project $project
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(ProjectRequest $request, Project $project)
    {
        $validatedData = $request->validated();

        $project->update($validatedData);

        return redirect()->route('projects.index')->with('success', 'Project updated successfully.');
    }

    /**
     * Remove the specified project from storage.
     *
     * @param \App\Models\Project $project
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Project $project)
    {
        $project->delete();

        return redirect()->route('projects.index')->with('success', 'Project deleted successfully.');
    }
}
