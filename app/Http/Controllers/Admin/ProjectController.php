<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::all();
        return view('projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('projects.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        // dd($data);
        //creo una nuova instanza nella tabella Projects

        $newProject = new Project();

        $newProject->name = $data['name'];
        $newProject->customer = $data['customer'];
        $newProject->start_date = $data['start_date'];
        $newProject->summary = $data['summary'];

        $newProject->save();

        return redirect()->route('projects.show', $newProject);

    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        return view('projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        return view('projects.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        $data = $request->all();

        $project->name = $data['name'];
        $project->customer = $data['customer'];
        $project->start_date = $data['start_date'];
        $project->summary = $data['summary'];

        $project->update();

        return redirect()->route('projects.show', compact('project'))
            ->with('success', 'Progetto modificato con successo!');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
