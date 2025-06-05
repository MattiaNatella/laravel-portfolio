@extends('layouts.app')

@section('title', 'Progetto aggiunto')

@section('content')

    @if (session('message'))
        <h2 class="text-{{ session('message_type') }}">{{ session('message') }}</h2>

    @endif

    <div class="card">
        <h5 class="card-header">{{ $project->name }} / {{ $project->start_date }} / Tipo {{ $project->type->name }}</h5>
        <div class="card-body">
            <h5 class="card-title">{{ $project->customer }}</h5>
            <p class="card-text">{{ $project->summary }}</p>
        </div>
    </div>

@endsection