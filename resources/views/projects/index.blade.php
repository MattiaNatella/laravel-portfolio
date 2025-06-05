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

    <div class="tipologie my-5 p-3 border border-3 border-primary rounded-2 d-flex flex-column">
        <h3 class="text-center"><strong>Tipologie Attuali:</strong></h3>
        <ul class="list-unstyled my-3">
            @foreach ($types as $type)
                <li class="pe-2 p-1 border border-danger rounded my-2 me-1"><strong>{{ $type->name }} -</strong>
                    {{ $type->description }} </li>

            @endforeach
        </ul>
        <div class="type_buttons d-flex gap-4 justify-content-center">
            <form id="typeForm" action="" method="POST">
                @csrf

                <div class="d-flex flex-column">
                    <label for="name">Tipologia</label>
                    <input type="text" name="name" id="name">
                </div>

                <div class="d-flex flex-column mb-3">
                    <label for="description">Descrizione</label>
                    <input type="text" name="description" id="description">
                </div>

                <div class="my-3 d-flex flex-column">
                    <label for="type_id" class="text-center">Tipologia</label>
                    <select name="type_id" id="type_id" onchange="fillTypeData(this.value)">
                        <option value="">Seleziona una tipologia...</option>
                        @foreach ($types as $type)
                            <option value="{{ $type->id }}" data-name="{{ $type->name }}"
                                data-description="{{ $type->description }}">
                                {{ $type->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <button type="button" class="btn btn-outline-primary"
                    onclick="submitForm('{{ route('types.store') }}', 'POST')">
                    Aggiungi Tipologia
                </button>
                <button type="button" class="btn btn-outline-warning" onclick="handleEdit()">
                    Modifica Tipologia
                </button>
                <button type="button" class="btn btn-outline-danger"
                    onclick="submitForm('{{ route('types.destroy', $type) }}', 'DELETE')">
                    Elimina Tipologia
                </button>
            </form>
        </div>
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

<script>
    function submitForm(route, method) {
        const form = document.getElementById('typeForm');
        form.action = route;
        form.method = 'POST';  // Il form deve sempre usare POST per supportare altri metodi HTTP

        if (method !== 'POST') {
            const methodInput = document.createElement('input');
            methodInput.type = 'hidden';
            methodInput.name = '_method';
            methodInput.value = method;
            form.appendChild(methodInput);
        }

        form.submit();
    }

    function fillTypeData(typeId) {
        if (!typeId) {
            document.getElementById('name').value = '';
            document.getElementById('description').value = '';
            return;
        }

        const option = document.querySelector(`#type_id option[value="${typeId}"]`);
        document.getElementById('name').value = option.dataset.name;
        document.getElementById('description').value = option.dataset.description;
    }

    function handleEdit() {
        const selectedId = document.getElementById('type_id').value;
        if (!selectedId) {
            alert('Seleziona una tipologia da modificare');
            return;
        }
        submitForm(`/types/${selectedId}`, 'PUT');
    }
</script>