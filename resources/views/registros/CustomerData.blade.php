<x-app-layout>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Solicitud de Envío') }}
        </h2>
    </x-slot>

    <div class="container mt-5">
        <div class="description">
            <h2>Formulario de Solicitud de Envío</h2>
            <p>Por favor, complete el siguiente formulario con los datos del remitente para procesar
                su solicitud de envío. Asegúrese de proporcionar información precisa para evitar retrasos en el envío.
            </p>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card shadow-lg rounded-3 border-0">
                    <div class="card-header text-center bg-dark text-white">
                        <h3>Información del Remitente</h3>
                    </div>
                    <div class="card-body p-5">
                        <!-- Formulario de Solicitud -->
                        <form id="remitenteForm" action="{{ route('CustomerData') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="nombre" class="form-label">Nombre</label>
                                    <input type="text" class="form-control" id="nombre" name="nombre" required
                                        value="{{ old('nombre') }}">
                                    @error('nombre')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="apellido" class="form-label">Apellido</label>
                                    <input type="text" class="form-control" id="apellido" name="apellido" required
                                        value="{{ old('apellido') }}">
                                    @error('apellido')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="document_type" class="form-label">Tipo de Documento</label>
                                <select id="document_type" name="document_type" class="form-select" required>
                                    <option value="">Seleccionar</option>
                                    <option value="cc">CC</option>
                                    <option value="ti">TI</option>
                                    <option value="ce">CE</option>
                                    <option value="pasaporte">Pasaporte</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="document" class="form-label">Documento</label>
                                <input type="text" class="form-control" id="document" name="document" required
                                    value="{{ old('document') }}">
                                @error('document')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" required
                                    value="{{ old('email') }}">
                                @error('email')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="telefono" class="form-label">Teléfono</label>
                                <input type="text" class="form-control" id="telefono" name="telefono" required
                                    value="{{ old('telefono') }}">
                                @error('telefono')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="direccion" class="form-label">Dirección</label>
                                <input type="text" class="form-control" id="direccion" name="direccion" required
                                    value="{{ old('direccion') }}">
                                @error('direccion')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="ciudad" class="form-label">Ciudad</label>
                                <input type="text" class="form-control" id="ciudad" name="ciudad" required
                                    value="{{ old('ciudad') }}">
                                @error('direccion')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="departamento" class="form-label">Departamento</label>
                                <input type="text" class="form-control" id="departamento" name="departamento"
                                    required value="{{ old('departamento') }}">
                                @error('departamento')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="codigo_postal" class="form-label">Código Postal</label>
                                <input type="text" class="form-control" id="codigo_postal" name="codigo_postal"
                                    required value="{{ old('codigo_postal') }}">
                                @error('codigo_postal')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="fecha_recoleccion" class="form-label">Fecha de Recolección</label>
                                <input type="date" class="form-control" id="fecha_recoleccion"
                                    name="fecha_recoleccion" required>
                                @error('fecha_recoleccion')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="hora_recogida" class="form-label">Intervalo</label>
                                <select id="hora_recogida" name="hora_recogida" class="form-select" required>
                                    <option value="">Seleccionar intervalo</option>
                                    <option value="manana">Mañana de 8:00 a 12:00</option>
                                    <option value="tarde">Tarde de 12:00 a 20:00</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="observaciones" class="form-label">Observaciones</label>
                                <textarea id="observaciones" name="observaciones" rows="4" class="form-control"
                                    placeholder="Escribe tus observaciones aquí..."></textarea>
                                @error('observaciones')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="d-grid gap-2">
                                <button type="submit" id="siguientebtn"
                                    class="btn btn-lg btn-success">Siguiente</button>
                            </div>
                        </form>
                    </div> <!-- Cierre del div card-body -->
                </div>
            </div>
        </div>
    </div>

    {{-- MODAL PARA MANEJAR LOS MENSAJES DE ERROR --}}

    <div class="modal fade" id="errorModal" tabindex="-1" aria-labelledby="errorModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="errorModalLabel">Error</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Todos los campos son obligatorios.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>


    {{-- Script para la validacion --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('remitenteForm').addEventListener('submit', function(event) {
                const inputs = document.querySelectorAll(
                    '#remitenteForm input[required], #remitenteForm select[required]');
                let allFilled = true;

                inputs.forEach(input => {
                    if (!input.value.trim()) {
                        allFilled = false;
                    }
                });

                if (!allFilled) {
                    event.preventDefault(); // Previene el envío del formulario
                    var myModal = new bootstrap.Modal(document.getElementById('errorModal'));
                    myModal.show(); // Muestra el modal
                } else {
                    window.location.href = "{{ route('RecipientData.index') }}"
                }
            });
        });
    </script>

</x-app-layout>

<style>
    .container {
        max-width: 1000px;
        margin: 0 auto;
        padding: 40px;
        background-color: #ffffff;
        border-radius: 10px;
        box-shadow: 0px 6px 12px rgba(0, 0, 0, 0.1);
    }

    .description {
        text-align: center;
        margin-bottom: 40px;
    }

    .description h2 {
        font-size: 28px;
        color: #001F3F;
        margin-bottom: 15px;
    }

    .description p {
        font-size: 18px;
        color: #555555;
        line-height: 1.7;
    }

    .card {
        background-color: #f9f9f9;
    }

    .card-header {
        background-color: #001F3F;
        color: #ffffff;
    }

    .card-body {
        background-color: #ffffff;
    }

    .form-label {
        font-weight: bold;
        color: #001F3F;
    }

    .form-control,
    .form-select {
        border: 1px solid #D9D9D9;
        background-color: #f9f9f9;
        color: #001F3F;
        padding: 10px;
        font-size: 16px;
        border-radius: 5px;
    }

    .form-control:focus,
    .form-select:focus {
        border-color: #2ECC40;
        box-shadow: none;
    }

    .btn-success {
        background-color: #2ECC40;
        border-color: #2ECC40;
        font-size: 18px;
        padding: 12px;
        transition: background-color 0.3s ease;
    }

    .btn-success:hover {
        background-color: #28a745;
    }
</style>
