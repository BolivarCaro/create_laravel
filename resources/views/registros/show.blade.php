@extends('layouts.app')

@section('title', 'Descripción')

@section('content')
    <div class="container mt-5">
        <div class="text-center">
            <!-- Imagen del registro -->
            <img class="img-fluid rounded shadow"
                style="max-height: 300px; width: auto; max-width: 100%; margin-bottom: 20px; object-fit: cover;"
                src="{{ Storage::url($record->imagen) }}" alt="{{ $record->nombre }}">

            <!-- Nombre del registro -->
            <h3 class="mt-3 mb-3" style="color: #001F3F; font-size: 2.2rem; font-weight: 700;">{{ $record->nombre }}
                {{ $record->apellido }}</h3>

            <!-- Detalles del registro -->
            <div class="details mb-4">
                <p class="card-text" style="font-size: 1.1rem; color: #555;">Edad: <span
                        style="font-weight: 600;">{{ $record->edad }} años</span></p>
                <p class="card-text" style="font-size: 1.1rem; color: #555;">Documento: <span
                        style="font-weight: 600;">{{ $record->documento }}</span></p>
                <p class="card-text" style="font-size: 1.1rem; color: #555;">Email: <span
                        style="font-weight: 600;">{{ $record->email }}</span></p>
            </div>

            <a href="{{ route('registro.edit', $record->id) }}" class="btn btn-primary mt-3">Editar</a>

            <!--Boton de eliminacion, activa el modal-->
            <button type="button" class="btn btn-danger mt-3" data-bs-toggle="modal" data-bs-target="#deleteModal">
                Eliminar
            </button>
        </div>
    </div>
    <!--Modal de confirmacion-->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Confirmar eliminación</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar </button>
                    <form action="{{ route('registro.destroy', $record->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                    </form>

                </div>

            </div>

        </div>

    </div>
@endsection

<style>
    .details p {
        margin-bottom: 10px;
    }

    .btn-custom {
        border-radius: 5px;
        padding: 10px 20px;
        font-weight: bold;
        text-transform: uppercase;
        transition: all 0.3s ease;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        display: inline-block;
        text-align: center;
    }

    .btn-primary {
        background-color: #001F3F;
        color: white;
        border: none;
    }

    .btn-primary:hover {
        background-color: #001a35;
    }

    .btn-danger {
        background-color: #FF4136;
        color: white;
        border: none;
    }

    .btn-danger:hover {
        background-color: #e0332b;
    }

    .btn-secondary {
        background-color: #D9D9D9;
        color: #001F3F;
        border: none;
    }

    .btn-secondary:hover {
        background-color: #bfbfbf;
    }

    .modal-dialog {
        margin: auto;
        max-width: 500px; /* Ajusta el ancho máximo del modal si es necesario */
    }

    .modal-content {
        border-radius: 10px;
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15);
        border: none;
    }

    .modal-header {
        background-color: #001F3F;
        color: white;
        border-bottom: none;
        border-radius: 10px 10px 0 0;
        padding: 20px;
        text-align: center;
    }

    .modal-body {
        color: #001F3F;
        padding: 20px;
        text-align: center;
    }

    .modal-footer {
        display: flex;
        justify-content: center;
        gap: 10px;
        border-top: none;
        padding: 15px 20px;
    }

    .modal-footer .btn {
        margin: 0;
    }
</style>
