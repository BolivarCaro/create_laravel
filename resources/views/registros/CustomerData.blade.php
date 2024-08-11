<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('New Service') }}
        </h2>
    </x-slot>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6"> <!-- Ajusta el ancho del formulario a la mitad de la pantalla -->
                <div class="card shadow-lg rounded-3">
                    <div class="card-header text-center" style="background-color: #001F3F; color: white;">
                        <h3>Sender Information</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('CustomerData.store') }}" method="POST" enctype="multipart/form-data">
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
                                <label for="document_type" class="form-label" style="color: #001F3F;">Tipo de documento</label>
                                <select id="document_type" name="document_type" required
                                    style="padding: 8px; margin-bottom: 16px; width: 200px; border: 1px solid #D9D9D9; background-color: #FFFFFF; color: #001F3F;">
                                    <option value="">Seleccionar</option>
                                    <option value="cc">CC</option>
                                    <option value="ti">TI</option>
                                    <option value="ce">CE</option>
                                    <option value="pasaporte">Pasaporte</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="document" class="form-label" style="color: #001F3F;">Documento</label>
                                <input type="text" class="form-control" id="document" name="document"
                                    style="border: 2px solid #ccc; background-color: #f9f9f9;">
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label" style="color: #001F3F;">Email</label>
                                <input type="email" class="form-control" id="email" name="email"
                                    style="border: 2px solid #ccc; background-color: #f9f9f9;">
                            </div>
                            <div class="mb-3">
                                <label for="telefono" class="form-label" style="color: #001F3F;">Teléfono</label>
                                <input type="text" class="form-control" id="telefono" name="telefono"
                                    style="border: 2px solid #ccc; background-color: #f9f9f9;">
                            </div>
                            <div class="mb-3">
                                <label for="direccion" class="form-label" style="color: #001F3F;">Dirección</label>
                                <input type="text" class="form-control" id="direccion" name="direccion"
                                    style="border: 2px solid #ccc; background-color: #f9f9f9;">
                            </div>
                            <div class="mb-3">
                                <label for="ciudad" class="form-label" style="color: #001F3F;">Ciudad</label>
                                <input type="text" class="form-control" id="ciudad" name="ciudad"
                                    style="border: 2px solid #ccc; background-color: #f9f9f9;">
                            </div>
                            <div class="mb-3">
                                <label for="departamento" class="form-label" style="color: #001F3F;">Departamento</label>
                                <input type="text" class="form-control" id="departamento" name="departamento"
                                    style="border: 2px solid #ccc; background-color: #f9f9f9;">
                            </div>
                            <div class="mb-3">
                                <label for="codigo_postal" class="form-label" style="color: #001F3F;">Código Postal</label>
                                <input type="text" class="form-control" id="codigo_postal" name="codigo_postal"
                                    style="border: 2px solid #ccc; background-color: #f9f9f9;">
                            </div>
                            <div class="mb-3">
                                <label for="fecha_recoleccion" class="form-label" style="color: #001F3F;">Fecha de Recolección</label>
                                <input type="date" class="form-control" id="fecha_recoleccion" name="fecha_recoleccion"
                                    style="border: 2px solid #ccc; background-color: #f9f9f9;">
                            </div>
                            <div class="mb-3">
                                <label for="hora_recogida" style="display: block; margin-bottom: 8px;">Intervalo</label>
                                <select id="hora_recogida" name="hora_recogida" required
                                    style="padding: 8px; margin-bottom: 16px; width: 200px; border: 1px solid #D9D9D9; background-color: #FFFFFF; color: #001F3F;">
                                    <option value="">Seleccionar intervalo</option>
                                    <option value="manana">Mañana de 8:00 a 12:00</option>
                                    <option value="tarde">Tarde de 12:00 a 20:00</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="observaciones" class="form-label" style="color: #001F3F;">Observaciones</label>
                                <textarea id="observaciones" name="observaciones" rows="4" class="form-control"
                                    style="border: 2px solid #ccc; background-color: #f9f9f9;" placeholder="Escribe tus observaciones aquí..."></textarea>
                            </div>
                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-lg"
                                    style="background-color: #2ECC40; color: #FFFFFF;">Siguiente</button>
                            </div>
                        </form>
                    </div> <!-- Cierre del div card-body -->
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
