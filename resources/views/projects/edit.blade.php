@extends('layouts.app')

@section('title', 'Modifica progetto')

@section('content')

    <h2>Modifica il progetto!</h2>

    <form action="{{ route('projects.update', $project) }}" method="POST"
        class="border border-3 border-primary rounded p-2 my-5">
        @csrf
        @method('PUT')

        <div class="my-3 d-flex flex-column">
            <label for="name" class="text-center">Nome</label>
            <input type="text" name="name" id="name" value="{{ $project->name }}">
        </div>

        <div class="my-3 d-flex flex-column">
            <label for="customer" class="text-center">Cliente</label>
            <input type="text" name="customer" id="customer" value="{{ $project->customer }}">
        </div>

        <div class="my-3 d-flex flex-column">
            <label for="type_id" class="text-center">Tipologia</label>
            <select name="type_id" id="type_id">
                @foreach ($types as $type)
                    <option value="{{ $type->id }}" {{ $project->type_id === $type->id ? "selected" : "" }}>{{ $type->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- TAGS -->
        <span class="">Tecnologie</span>
        <div class="d-flex border border-2 border-primary rounded p-2 justify-content-center">
            @foreach ($technologies as $technology)

                <input type="checkbox" name="technologies[]" value="{{ $technology->id }}" id="technology" {{ $project->technologies->contains($technology->id) ? "checked" : "" }}>
                <label for="technology" class="me-3">{{$technology->name}}</label>

            @endforeach

        </div>


        <div class="my-3 d-flex flex-column">
            <label for="start_date" class="text-center">Data inizio</label>
            <input type="date" name="start_date" id="start_date" value="{{ $project->start_date }}">
        </div>

        <div class="my-3 d-flex flex-column">
            <label for="summary" class="text-center">Descrizione</label>
            <textarea name="summary" id="summary">{{ $project->summary }}</textarea>
        </div>


        <input type="submit" value="invia">



    </form>

@endsection