@extends("layouts.app")


@section("title", "Vista progetti")

@section("content")

    <div class="container">

        <h1>Ciao sono la pagina dove visualizzeremo la lista dei componenti!</h1>
        @foreach ($projects as $project)

                <div class="border border-1 rounded-1">
                    <h2>{{ $project->name }}</h2>
                    <h2>{{ $project->customer}}</h2>
                    <h2>{{ $project->start_date }} {{ $project->end_date }}</h2>
                    <h2>{{ $project->summary }}</h2>
                </div>

            </div>
        @endforeach

@endsection