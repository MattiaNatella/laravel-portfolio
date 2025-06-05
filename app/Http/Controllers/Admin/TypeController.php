<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Type;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return "ciao sono la index delle tipologie";
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $newType = new Type();

        $newType->name = $data['name'];
        $newType->description = $data['description'];

        $newType->save();

        return redirect()->route('projects.index')
            ->with('message', 'Tipologia inserita con successo!')
            ->with('message_type', 'info');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Type $type)
    {
        $data = $request->all();

        $type->name = $data['name'];
        $type->description = $data['description'];


        $type->update();

        return redirect()->route('projects.index', )
            ->with('message', 'Progetto modificato con successo!')
            ->with('message_type', 'warning');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
