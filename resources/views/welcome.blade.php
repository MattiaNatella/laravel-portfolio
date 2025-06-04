@extends('layouts.app')
@section('content')

    <div class="jumbotron p-5 mb-4 bg-light rounded-3">
        <div class="container py-5">

            <h1 class="display-5 fw-bold">
                Benvenuto nel mio Portfolio
            </h1>

            <p class="col-md-8 fs-4 my-3">
                Qui troverai una parte dei miei progetti, sviluppati utilizzando React <i
                    class="fa-brands fa-react fw-medium fs-1" style="color: #74C0FC;"></i> come framework per il Front-End,
                e Laravel <i class="fa-brands fa-laravel fw-medium fs-1" style="color: #EF3B2D;"></i> per il Back-End.
            </p>

            <h2>Skills attuali:</h2>
            <ul class="list-unstyled d-flex my-3 gap-3">
                <li><i class="fa-brands fa-html5 fw-medium fs-1" style="color: #E96228;"></i> HTML</li>
                <li><i class="fa-brands fa-css3-alt fw-medium fs-1" style="color: #0074BE;"></i> CSS</li>
                <li><i class="fa-brands fa-js fw-medium fs-1" style="color: #FFD43B;"></i> JAVASCRIPT</li>
                <li><i class="fa-brands fa-php fw-medium fs-1" style="color: #7E8CC2;"></i> PHP</li>
            </ul>
            </p>
            <a href="{{route("projects.index")}}" class="btn btn-primary btn-lg my-3" type="button">Prosegui ai progetti</a>
        </div>
    </div>

    <div class="content">
        <div class="container">
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Tempora temporibus, dicta nemo aliquam totam nisi
                deserunt soluta quas voluptatum ab beatae praesentium necessitatibus minus, facilis illum rerum officiis
                accusamus dolores!</p>
        </div>
    </div>
@endsection