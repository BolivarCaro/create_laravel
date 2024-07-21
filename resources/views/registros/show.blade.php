@extends('layouts.app')

@section('title', 'Descripción')

@section('content')
    <div class="container mt-5">
        <div class="text-center">
            <!-- Imagen del registro -->
            <img class="img-fluid rounded shadow" style="max-height: 300px; width: auto; max-width: 100%; margin-bottom: 20px; object-fit: cover;" src="{{ Storage::url($record->imagen) }}" alt="{{ $record->nombre }}">

            <!-- Nombre del registro -->
            <h3 class="mt-3 mb-3" style="color: #001F3F; font-size: 2.2rem; font-weight: 700;">{{ $record->nombre }} {{ $record->apellido }}</h3>

            <!-- Detalles del registro -->
            <div class="details mb-4">
                <p class="card-text" style="font-size: 1.1rem; color: #555;">Edad: <span style="font-weight: 600;">{{ $record->edad }} años</span></p>
                <p class="card-text" style="font-size: 1.1rem; color: #555;">Documento: <span style="font-weight: 600;">{{ $record->documento }}</span></p>
                <p class="card-text" style="font-size: 1.1rem; color: #555;">Email: <span style="font-weight: 600;">{{ $record->email }}</span></p>
            </div>

            <a href="/registro/{{ $record->id }}/edit" class="btn btn-primary mt-3">Editar</a>
        </div>
    </div>
@endsection

<style>
    .details p {
        margin-bottom: 10px;
    }

    .btn-custom {
        background-color: #2ECC40; /* Color verde */
        color: white;
        border: 2px solid #2ECC40;
        border-radius: 25px;
        padding: 12px 24px;
        text-transform: uppercase;
        font-weight: bold;
        text-decoration: none;
        font-size: 1rem;
        display: inline-block;
        transition: all 0.3s ease;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .btn-custom:hover {
        background-color: #28B537;
        border-color: #28B537;
        transform: translateY(-2px);
        box-shadow: 0 6px 10px rgba(0, 0, 0, 0.15);
    }

    .btn-custom:active {
        background-color: #239E31;
        border-color: #239E31;
        transform: translateY(0);
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .rounded {
        border-radius: 10px;
    }

    .shadow {
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    }
</style>
