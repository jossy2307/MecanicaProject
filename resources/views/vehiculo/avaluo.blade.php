<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $vehiculo->name ?? __('Avaluo') . ' ' . __('Vehiculo') }}
        </h2>
    </x-slot>

    <div class="py-12">
    <div class="max-w-full my-5 mx-auto sm:px-6 lg:px-8"> <a class="text-blue-400 underline" href="{{ route('dashboard') }}">Dashboard</a> / <a class="text-blue-400 underline"
    href="{{ route('vehiculos.index') }}">Vehiculos</a> / {{ __('Detalle del Vehiculo') }}</div>
        <div class="max-w-full mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="w-full">
                    <div class="sm:flex sm:items-center">
                        <div class="sm:flex-auto">
                            <h1 class="text-base font-semibold leading-6 text-gray-900">Detalles del {{ __('Vehiculo') }}
                                {{ $vehiculo->placa }}</h1>
                        </div>
                        
                    </div>
                    <div class="flex flex-col md:flex-row items-center py-6">
                        <div class="w-full max-w-xl px-4 sm:px-6 lg:px-8">
                            <div class="overflow-hidden border border-gray-300 shadow-lg rounded-lg bg-white">
                                <div class="flex flex-col space-y-4 p-6">
                                    <div class="flex justify-between items-center">
                                        <p class="font-semibold text-gray-700">Nombre</p>
                                        <p class="text-gray-900">{{ $vehiculo->cliente->nombre }}</p>
                                    </div>
                                    <div class="flex justify-between items-center">
                                        <p class="font-semibold text-gray-700">Año</p>
                                        <p class="text-gray-900">{{ $vehiculo->anio }}</p>
                                    </div>
                                    <div class="flex justify-between items-center">
                                        <p class="font-semibold text-gray-700">Marca</p>
                                        <p class="text-gray-900">{{ $vehiculo->marca }}</p>
                                    </div>
                                    <div class="flex justify-between items-center">
                                        <p class="font-semibold text-gray-700">Modelo</p>
                                        <p class="text-gray-900">{{ $vehiculo->modelo }}</p>
                                    </div>
                                    <div class="flex justify-between items-center">
                                        <p class="font-semibold text-gray-700">Kilometraje</p>
                                        <p class="text-gray-900">{{ $vehiculo->kilometraje }}</p>
                                    </div>
                                    <div class="flex justify-between items-center">
                                        <p class="font-semibold text-gray-700">Color</p>
                                        <p class="text-gray-900">{{ $vehiculo->color }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mt-8 overflow-x-auto">
                            <div class="max-w-6xl py-2">
                                <div class="flex space-x-10 items-end my-5">
                                    <div>
                                        <meta name="csrf-token"
                                            content="{{ csrf_token() }}">
                                        <input type="hidden"
                                            id="id_vehiculo"
                                            value="{{ $vehiculo->id }}">
                                        <input type="hidden"
                                            id="anio"
                                            value="{{ $vehiculo->anio }}">
                                        <input type="hidden"
                                            id="kilometraje"
                                            value="{{ $vehiculo->kilometraje }}">
                                        <input type="hidden"
                                            id="valoMeca"
                                            value="{{ $vehiculo->valores_mecanicos }}">
                                        <x-label for="precio_vehiculo"
                                            :value="__('Valor del Vehiculo')" />
                                        <x-input id="precio_vehiculo"
                                            name="precio_vehiculo"
                                            type="number"
                                            class="mt-1 block w-full "
                                            :value="old('precio_vehiculo', $vehiculoPrecio?->precio_vehiculo)"
                                            placeholder="Valor del Vehiculo" />
                                        <x-input-error class="mt-2"
                                            for="precio_vehiculo" />
                                    </div>
                                    <div>
                                        <x-label for="depreciacion"
                                            :value="__('Depreciacion')" />
                                        <select name="depreciacion"
                                            id="depreciacion"
                                            class="border-gray-300 my-1 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                                            <option value="">-- Seleccione --</option>
                                            <option value="5">5 %</option>
                                            <option value="6">6 %</option>
                                            <option value="7">7 %</option>
                                            <option value="8">8 %</option>
                                            <option value="9">9 %</option>
                                            <option value="10">10 %</option>
                                        </select>
                                        <x-input-error class="mt-2"
                                            for="depreciacion" />
                                    </div>
                                    <div>
                                        <x-label for="iva"
                                            :value="__('Iva %')" />
                                        <x-input id="iva"
                                            name="iva"
                                            type="number"
                                            class="mt-1 block w-full bg-gray-200"
                                            value="15" />
                                        <x-input-error class="mt-2"
                                            for="iva" />
                                    </div>

                                </div>
                                <div class="flex items-end space-x-10 border-t border-slate-200">
                                    <div class="my-5">
                                        <x-label for="precio_final"
                                            :value="__('Precio Vehiculo')" />
                                        <x-input id="precio_final"
                                            name="precio_final"
                                            type="number"
                                            class="mt-1 block w-full bg-gray-200"
                                            placeholder="Precio Vehiculo"
                                            readonly />
                                    </div>
                                    <div class="my-5">
                                        <x-label for="anios_antiguedad"
                                            :value="__('Años de Antigüedad Por Kilometraje')" />
                                        <x-input id="anios_antiguedad"
                                            name="anios_antiguedad"
                                            type="number"
                                            class="mt-1 block w-full bg-gray-200"
                                            placeholder="Años de Antigüedad"
                                            readonly />
                                    </div>
                                    <div class="my-5">
                                        <x-label for="valores_mecanicos"
                                            :value="__('Valores Mecanicos')" />
                                        <x-input id="valores_mecanicos"
                                            name="valores_mecanicos"
                                            type="number"
                                            class="mt-1 block w-full bg-gray-200"
                                            placeholder="Valores Mecanicos"
                                            readonly />
                                    </div>

                                </div>
                                <div class="flex items-end space-x-10">
                                    <div class="my-5 bg-indigo-500 p-3 rounded-lg">
                                        <x-label for="valor_sistema"
                                            class="text-white"
                                            :value="__('Valor Sistema')" />
                                        <x-input id="valor_sistema"
                                            name="valor_sistema"
                                            type="number"
                                            class="mt-1 block w-full bg-gray-200"
                                            placeholder="Valor Sistema"
                                            readonly />
                                    </div>
                                    <div class="my-5 bg-indigo-500 p-3 rounded-lg">
                                        <x-label for="valor_sistema"
                                            class="text-white"
                                            :value="__('Oferta Final')" />
                                        <x-input id="oferta"
                                            name="oferta"
                                            type="number"
                                            class="mt-1 "
                                            :value="old('oferta', $vehiculoPrecio?->oferta)"
                                            placeholder="Oferta Final" />
                                    </div>
                                    <button id="guardarCalculo"
                                        class="bg-green-500  mb-5 h-10 hover:bg-green-700 text-white font-bold py-2 px-6 rounded-lg">Guardar</button>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {

            document.getElementById('depreciacion').addEventListener('change', calculate);

            function calculate() {
                // Your existing calculation logic here
                const precioVehiculo = parseFloat(document.getElementById('precio_vehiculo').value);
                const depreciacion = parseFloat(document.getElementById('depreciacion').value);

                const anio = parseFloat(document.getElementById('anio').value);
                const kilometraje = parseFloat(document.getElementById('kilometraje').value);
                const iva = parseFloat(document.getElementById('iva').value);
                const valoMeca = parseFloat(document.getElementById('valoMeca').value);
                if (isNaN(precioVehiculo) || isNaN(depreciacion)) {
                    alert(
                        'Por favor, ingrese valores válidos para el precio del vehículo y la depreciación.'
                    );
                    return;
                }
                let aniosAntiguedad = Math.floor(kilometraje / 20000);
                aniosAntiguedad = aniosAntiguedad > 0 ? aniosAntiguedad : 1;
                document.getElementById('anios_antiguedad').value = aniosAntiguedad;
                const precioSinIva = precioVehiculo - (precioVehiculo * (iva / 100));
                let precioFinal = precioSinIva;
                for (let i = 0; i < aniosAntiguedad; i++) {
                    precioFinal -= ((precioFinal * depreciacion) / 100);
                }
                document.getElementById('precio_final').value = precioFinal.toFixed(2);
                document.getElementById('valores_mecanicos').value = valoMeca;
                document.getElementById('valor_sistema').value = (precioFinal - valoMeca).toFixed(2);
            }

            document.getElementById('guardarCalculo').addEventListener('click', function() {
                const formData = new FormData();

                const idVehiculo = parseInt(document.getElementById('id_vehiculo').value);

                formData.append('vehiculo_id', idVehiculo); // Reemplaza con el valor adecuado
                formData.append('precio_vehiculo', document.getElementById('precio_vehiculo').value);
                formData.append('depreciacion', document.getElementById('depreciacion').value);
                formData.append('iva', document.getElementById('iva').value);
                formData.append('anio_antiguedad_kilometraje', document.getElementById('anios_antiguedad')
                    .value);
                formData.append('valor_sistema', document.getElementById('valor_sistema').value);
                formData.append('oferta', document.getElementById('oferta').value);

                const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

                fetch('/vehiculo-precios', {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': csrfToken,
                        },
                        body: formData
                    })
                    .then(response => {
                        console.log(response);
                        return response.json()
                    })
                    .then(data => {
                        console.log(data);
                    })
                    .catch(error => {
                        console.error(error);
                    }).finally(() => {
                        window.location.href = '/vehiculos/'
                    })
            });
        });
    </script>
</x-app-layout>
