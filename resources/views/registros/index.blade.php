<x-app-layout>
    @slot('header')
        <h2 class="text-xl font-semibold leading-tight text-center">
            Lista de registros
        </h2>
    @endslot

    <div class="container mt-5">
        <h3 class="text-center mb-4">Listado de registros disponibles</h3>
        <div class="row justify-content-center">
            @foreach ($record as $records)
                <div class="col-md-4 mb-4 d-flex align-items-stretch">
                    <div class="card shadow-sm" style="width: 100%; max-width: 18rem;">
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

        /* Additional styles for alignment and spacing */
        .card-body {
            padding: 1.25rem; /* Adjust padding as needed */
        }

        .card {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }
    </style>
</x-app-layout>
