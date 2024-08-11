
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Servicios de Envío') }}
        </h2>
    </x-slot>

    <div class="relative full-height-bg">
        <div class="absolute inset-0 bg-gray-900 opacity-50"></div>
        <div class="relative z-10 max-w-7xl mx-auto sm:px-6 lg:px-8 py-12">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg bg-opacity-75">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="text-2xl font-bold text-001F3F">Nuestros Servicios</h3>
                    <p class="mt-4 text-gray-700 dark:text-gray-300">
                        Ofrecemos una variedad de servicios de envío para satisfacer tus necesidades.
                    </p>

                    <div class="mt-8 bg-white/90 p-6 rounded-xl shadow-lg border border-D9D9D9">
                        <h4 class="text-2xl font-bold text-001F3F mb-6">Rastrea tu Envío</h4>
                        <form class="flex items-center space-x-4">
                            <div class="flex-1">
                                <label for="tracking_number" class="block text-gray-700 dark:text-gray-300 font-medium mb-2">Número de Guía</label>
                                <input type="text" id="tracking_number" name="tracking_number" class="block w-80 px-4 py-3 border border-D9D9D9 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-2ECC40 focus:border-2ECC40 text-base" placeholder="Ingresa tu número de guía">
                            </div>
                            <button type="submit" class="inline-flex items-center px-6 py-3 border border-transparent text-base font-semibold rounded-lg shadow-lg text-001F3F bg-2ECC40 hover:bg-28A745 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-2ECC40 transition duration-300">
                                Buscar
                            </button>
                        </form>
                    </div>

                    <div class="mt-8 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        <!-- Servicio 1 -->
                        <div class="bg-white p-4 rounded-lg shadow-lg">
                            <h4 class="text-xl font-semibold text-001F3F">Envío Nacional</h4>
                            <p class="mt-2 text-gray-600 dark:text-gray-400">
                                Rápido y seguro, con seguimiento en tiempo real.
                            </p>
                        </div>

                        <!-- Servicio 2 -->
                        <div class="bg-white p-4 rounded-lg shadow-lg">
                            <h4 class="text-xl font-semibold text-001F3F">Envío Internacional</h4>
                            <p class="mt-2 text-gray-600 dark:text-gray-400">
                                Entrega en todo el mundo con opciones de seguro.
                            </p>
                        </div>

                        <!-- Servicio 3 -->
                        <div class="bg-white p-4 rounded-lg shadow-lg">
                            <h4 class="text-xl font-semibold text-001F3F">Envío Express</h4>
                            <p class="mt-2 text-gray-600 dark:text-gray-400">
                                Entrega en 24 horas para emergencias.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
<style>
    .full-height-bg {
        height: 100vh; /* 100% de la altura de la ventana del navegador */
        background-image: url('/storage/registros/background.jpeg');
        background-size: cover; /* Ajusta la imagen para cubrir todo el contenedor */
        background-position: center; /* Centra la imagen */
        background-repeat: no-repeat; /* Evita la repetición de la imagen */
    }
</style>

