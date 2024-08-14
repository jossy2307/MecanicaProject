<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard de Vehículos') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="container mx-auto p-4">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <!-- Vehículos por mes -->
                        <div class="bg-white shadow-md rounded-lg p-6">
                            <h2 class="text-xl font-semibold mb-2">Vehículos Ingresados por Mes</h2>
                            @if ($vehiculosPorMes->isEmpty())
                                <p class="text-gray-500">No se encontraron registros de vehículos ingresados por mes.
                                </p>
                            @else
                                <ul>
                                    @foreach($vehiculosPorMes as $vehiculo)
                                    <li class="mb-2">
                                        <span class="font-semibold">Mes:</span> {{ \Carbon\Carbon::create()->locale('es')->month($vehiculo->mes)->translatedFormat('F') }} -
                                        <span class="font-semibold">Total:</span> {{ $vehiculo->total }}
                                    </li>
                                @endforeach
                                </ul>
                            @endif
                        </div>

                        <!-- Modelos más ingresados -->
                        <div class="bg-white shadow-md rounded-lg p-6">
                            <h2 class="text-xl font-semibold mb-2">Modelos más Ingresados</h2>
                            @if ($modelosMasIngresados->isEmpty())
                                <p class="text-gray-500">No se encontraron registros de modelos ingresados.</p>
                            @else
                                <ul>
                                    @foreach ($modelosMasIngresados as $modelo)
                                        <li class="mb-2">
                                            <span class="font-semibold">Modelo:</span> {{ $modelo->modelo }} -
                                            <span class="font-semibold">Total:</span> {{ $modelo->total }}
                                        </li>
                                    @endforeach
                                </ul>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
