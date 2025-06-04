@extends('layouts.app')

@section('title', 'Progetto aggiunto')

@section('content')

    <div class="card">
        <h5 class="card-header">{{ $project->name }} - {{ $project->start_date }}</h5>
        <div class="card-body">
            <h5 class="card-title">{{ $project->customer }}</h5>
            <p class="card-text">{{ $project->summary }}</p>
            <a href="#" class="btn btn-primary">Go somewhere</a>
        </div>
    </div>

@endsection