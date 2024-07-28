@extends('layouts.app')
@section('title', 'Editar Registros')
@section('content')

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-lg rounded-3">
                    <div class="card-header text-center" style="background-color: #001F3F; color: white;">
                        <h4 class="text-center">Editar Registro</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('registro.update', $record->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            <div class="mb-3">
                                <label for="nombre" class="form-label" style="color: #001F3F">Nombre</label>
                                <input type="text" class="form-control" id="nombre" name="nombre"
                                    value="{{ $record->nombre }}"
                                    style="border: 2px solid #ccc; background-color: #f9f9f9;">
                            </div>
                            <div class="mb-3">
                                <label for="apellido" class="form-label" style="color: #001F3F">Apellido</label>
                                <input type="text" class="form-control" id="apellido" name="apellido"
                                    value="{{ $record->apellido }}"
                                    style="border: 2px solid #ccc; background-color: #f9f9f9;">
                            </div>
                            <div class="mb-3">
                                <label for="edad" class="form-label" style="color: #001F3F">Edad</label>
                                <input type="number" class="form-control" id="edad" name="edad"
                                    value="{{ $record->edad }}" style="border: 2px solid #ccc; background-color:#f9f9f9;">
                            </div>
                            <div class="mb-3">
                                <label for="documento" class="form-label" style="color: #001F3F">Documento</label>
                                <input type="text" class="form-control" id="documento" name="documento"
                                    value="{{ $record->documento }}"
                                    style="border: 2px solid #ccc; background-color: #f9f9f9;">
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label" style="color: #001F3F">Email</label>
                                <input type="email" class="form-control" id="email" name="email"
                                    value="{{ $record->email }}" style="border: 2px solid #ccc; background-color: #f9f9f9;">
                            </div>
                            <div class="mb-3">
                                <label for="imagen" class="form-label" style="color: #001F3F">Cargar Imagen</label>
                                <input type="file" class="form-control" id="imagen" name="imagen"
                                    style="border: 2px solid #001F3F; padding: 5px">
                                <br>
                                <button type="submit" class="btn btn-lg"
                                    style="background-color: #2ECC40; color: white">Actualizar</button>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
