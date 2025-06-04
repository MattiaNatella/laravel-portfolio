@extends("layouts.app")


@section("title", "Vista progetti")

@section("content")



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
                    <td>Visualizza</td>
                    <td>Modifica</td>
                    <td>Elimina</td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection