@extends('layouts.app')
@section('title', 'Lista de registros')
@section('content')

    <div class="container mt-5">
        <h3 class="text-center">Listado de registros disponibles</h3>
        <br>
        <div class="row">
            @foreach ($record as $records)
                <div class="col-sm-4 mb-4">
                    <div class="card shadow-sm" style="width: 18rem;">
                        <img class="card-img-top" style="height: 200px; object-fit: cover;"
                            src="{{ Storage::url($records->imagen) }}" alt="{{ $records->nombre }}">
                        <div class="card-body">
                            <h5 class="card-title" style="color: #001F3F;">{{ $records->nombre }}</h5>
                            <p class="card-text">{{ $records->apellido }}</p>
                            <p class="card-text">{{ $records->edad }} años</p>
                            <p class="card-text">{{ $records->documento }}</p>
                            <p class="card-text">{{ $records->email }}</p>
                            <a href="/registro/{{ $records->id }}" class="btn btn-custom mt-3">Ver detalles</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

@endsection

<style>
    .btn-custom {
        background-color: #343a40;
        color: white;
        border: none;
        border-radius: 5px;
        padding: 10px 20px;
        text-transform: uppercase;
        font-weight: bold;
        font-size: 14px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        transition: background-color 0.3s ease, transform 0.3s ease, box-shadow 0.3s ease;
    }

    .btn-custom:hover {
        background-color: #23272b;
        transform: translateY(-2px);
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.15);
    }

    .btn-custom:active {
        background-color: #1d2124;
        transform: translateY(0);
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .btn-custom:focus {
        outline: none;
        box-shadow: 0 0 0 3px rgba(52, 58, 64, 0.4);
    }
</style>
