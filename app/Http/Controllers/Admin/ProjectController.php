<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Technology;
use App\Models\Type;
use Illuminate\Http\Request;





class ProjectController extends Controller
{

    /**
     * 
     * Display a listing of the resource.
     */
    public function index()
    {
        // Eager loading dei types insieme ai projects
        $projects = Project::with('type')->get();
        $types = Type::all();
        return view('projects.index', compact('projects', 'types'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $types = Type::all();
        $technologies = Technology::all();

        return view('projects.create', compact('types', 'technologies'));
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
        $newProject->type_id = $data['type_id'];

        $newProject->save();

        //verifichiamo se sono stati inserite delle technologie
        if ($request->has('technologies')) {

            //dopo aver salvato il progetto, agganciamo i tags delle technologies
            $newProject->technologies()->attach($data['technologies']);

        }



        return redirect()->route('projects.show', $newProject)
            ->with('message', 'Progetto inserito con successo!')
            ->with('message_type', 'info');

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
        $types = Type::all();
        $technologies = Technology::all();
        return view('projects.edit', compact('project', 'types', 'technologies'));
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
        $project->type_id = $data['type_id'];

        $project->update();

        //verifichiamo se stiamo ricevendo le technologies
        if ($request->has('technologies')) {
            // sincronizziamo i tags nella tabella pivot
            $project->technologies()->sync($data['technologies']);
        } else {
            //se non riceviamo dei tags eliminiamo i tags collegati al progetto attuale dalla tabella ponte
            $project->technologies()->detach();
        }



        return redirect()->route('projects.show', compact('project'))
            ->with('message', 'Progetto modificato con successo!')
            ->with('message_type', 'warning');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $project->delete();

        return redirect()->route('projects.index')
            ->with('message', 'Record eliminato con successo')
            ->with('message_type', 'danger');
    }
}
