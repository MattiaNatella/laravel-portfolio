@extends('layouts.app')

@section('title', 'Nuovo Progetto')

@section('content')
    <h2>Aggiungi un nuovo progetto!</h2>

    <form action="{{ route('projects.store') }}" method="POST"
        class="border border-3 border-primary rounded p-2 my-5 text-center">

        @csrf

        <div class="my-3 d-flex flex-column">
            <label for="name" class="">Nome</label>
            <input type="text" name="name" id="name">
        </div>

        <div class="my-3 d-flex flex-column">
            <label for="customer" class="">Cliente</label>
            <input type="text" name="customer" id="customer">
        </div>

        <div class="my-3 d-flex flex-column">
            <label for="type_id" class="">Tipologia</label>
            <select name="type_id" id="type_id" required>
                <option value="">Seleziona una tipologia...</option>
                @foreach ($types as $type)
                    <option value="{{ $type->id }}">{{ $type->name }}</option>
                @endforeach
            </select>
        </div>

        <!-- TAGS -->
        <span class="">Tecnologie</span>
        <div class="d-flex border border-2 border-primary rounded p-2 justify-content-center">
            @foreach ($technologies as $technology)

                <input type="checkbox" name="technologies[]" value="{{ $technology->id }}" id="technology">
                <label for="technology" class="me-3">{{$technology->name}}</label>

            @endforeach

        </div>


        <div class="my-3 d-flex flex-column">
            <label for="start_date" class="">Data inizio</label>
            <input type="date" name="start_date" id="start_date">
        </div>

        <div class="my-3 d-flex flex-column">
            <label for="summary" class="">Descrizione</label>
            <textarea name="summary" id="summary"></textarea>
        </div>


        <input type="submit" value="invia">



    </form>

@endsection