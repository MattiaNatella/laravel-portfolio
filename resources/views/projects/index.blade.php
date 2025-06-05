@extends("layouts.app")


@section("title", "Vista progetti")

@section("content")

    @if (session('message'))
        <h2 class="text-{{ session('message_type') }}">{{ session('message') }}</h2>

    @endif


    <a href="{{ route('projects.create') }}">
        <button class="btn btn-primary border-1 border-dark my-3">Aggiungi progetto</button>
    </a>



    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Customer</th>
                <th>Start Date</th>
                <th>Summary</th>
                <th>Type</th>
                <th></th>
            </tr>
        </thead>

        <tbody>
            @foreach ($projects as $project)
                <tr>
                    <td>{{ $project->name }}</td>
                    <td>{{ $project->customer }}</td>
                    <td>{{ $project->start_date }}</td>
                    <td>{{ $project->summary }}</td>
                    <td>{{ $project->type->name }}</td>
                    <td>
                        <a href="{{ route('projects.show', $project) }}"><button class="btn btn-primary">Visualizza</button></a>
                    </td>
                    <td> <a href="{{ route('projects.edit', $project) }}"><button class="btn btn-warning">Modifica</button></a>
                    </td>
                    <td>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            Elimina
                        </button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="tipologie my-5 p-3 border border-3 border-primary rounded-2">
        <h3><strong>Tipologie Attuali:</strong></h3>
        <ul class="d-flex list-unstyled my-3">
            @foreach ($types as $type)
                <li class="pe-2 border border-danger rounded p-1 me-1">{{ $type->name }}</li>

            @endforeach
        </ul>

        <button class="btn btn-outline-primary">Aggiungi Tipologia</button>
    </div>

@endsection





<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Cancellazione record {{ $project->id }}</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                L'eliminazione sarà <b>definitiva</b>, sei sicuro di voler procedere?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Chiudi</button>
                <form action="{{ route('projects.destroy', $project) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Elimina</button>

                </form>
            </div>
        </div>
    </div>
</div>