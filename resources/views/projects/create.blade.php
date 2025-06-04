@extends('layouts.app')

@section('title', 'Nuovo Progetto')

@section('content')
    <h2>Aggiungi un nuovo progetto!</h2>

    <form action="{{ route('projects.store') }}" method="POST" class="border border-3 border-primary rounded p-2 my-5">

        @csrf

        <div class="my-3 d-flex flex-column">
            <label for="name" class="text-center">Nome</label>
            <input type="text" name="name" id="name">
        </div>

        <div class="my-3 d-flex flex-column">
            <label for="customer" class="text-center">Cliente</label>
            <input type="text" name="customer" id="customer">
        </div>

        <div class="my-3 d-flex flex-column">
            <label for="start_date" class="text-center">Data inizio</label>
            <input type="date" name="start_date" id="start_date">
        </div>

        <div class="my-3 d-flex flex-column">
            <label for="summary" class="text-center">Descrizione</label>
            <textarea name="summary" id="summary"></textarea>
        </div>


        <input type="submit" value="invia">



    </form>

@endsection