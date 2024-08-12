<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Registro') }}
        </h2>
    </x-slot>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6"> <!-- El formulario ocupa la mitad de la pantalla -->
                <div class="card shadow-lg rounded-3">
                    <div class="card-header text-center" style="background-color: #001F3F; color: white;">
                        <h3>Registro</h3>
                    </div>
                    <div class="card-body">
                        <form action="/registro" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="nombre" class="form-label" style="color: #001F3F;">Nombre</label>
                                <input type="text" class="form-control" id="nombre" name="nombre"
                                    style="border: 2px solid #ccc; background-color: #f9f9f9;">
                            </div>
                            <div class="mb-3">
                                <label for="apellido" class="form-label" style="color: #001F3F;">Apellido</label>
                                <input type="text" class="form-control" id="apellido" name="apellido"
                                    style="border: 2px solid #ccc; background-color: #f9f9f9;">
                            </div>
                            <div class="mb-3">
                                <label for="edad" class="form-label" style="color: #001F3F;">Edad</label>
                                <input type="number" class="form-control" id="edad" name="edad"
                                    style="border: 2px solid #ccc; background-color: #f9f9f9;">
                            </div>
                            <div class="mb-3">
                                <label for="documento" class="form-label" style="color: #001F3F;">Documento</label>
                                <input type="text" class="form-control" id="documento" name="documento"
                                    style="border: 2px solid #ccc; background-color: #f9f9f9;">
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label" style="color: #001F3F;">Email</label>
                                <input type="email" class="form-control" id="email" name="email"
                                    style="border: 2px solid #ccc; background-color: #f9f9f9;">
                            </div>
                            <div class="d-grid gap-2">
                                <label for="imagen" class="form-label" style="color: #001F3F;">Cargar imagen</label>
                                <input type="file" name="imagen" class="form-control" id="imagen"
                                    style="border: 2px solid #001F3F; padding: 5px;">

                                <button type="submit" class="btn btn-lg"
                                    style="background-color: #2ECC40; color: white;">Crear</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
