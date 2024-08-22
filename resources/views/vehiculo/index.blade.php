<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Vehiculos') }}
        </h2>
    </x-slot>

    <div class="py-12">
    <div class="max-w-full my-5 mx-auto sm:px-6 lg:px-8"><a class="text-blue-400 underline"
     href="{{ route('dashboard') }}">Dashboard</a> /  {{ __('Vehiculos') }}</div>
        <div class="max-w-full mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="w-full">
                    <div class="sm:flex sm:items-center">
                        <div class="sm:flex-auto">
                            <h1 class="text-base font-semibold leading-6 text-gray-900">{{ __('Vehiculos') }}</h1>
                            <p class="mt-2 text-sm text-gray-700">Lista de todos los {{ __('Vehiculos') }}.</p>
                        </div>
                        <div class="mt-4 sm:ml-16 sm:mt-0 sm:flex-none">
                            <a type="button"
                                href="{{ route('vehiculos.create') }}"
                                class="block rounded-md bg-indigo-600 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Nuevo</a>
                        </div>
                    </div>

                    <div class="flow-root">
                        <div class="mt-8 overflow-x-auto">
                            <div class="inline-block min-w-full py-2 align-middle">
                                <table class="w-full divide-y divide-gray-300">
                                    <thead>
                                        <tr>
                                            <th scope="col"
                                                class="py-3 pl-4 pr-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">
                                                No</th>

                                            <th scope="col"
                                                class="py-3 pl-4 pr-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">
                                                Placa</th>
                                            <th scope="col"
                                                class="py-3 pl-4 pr-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">
                                                Color</th>
                                            <th scope="col"
                                                class="py-3 pl-4 pr-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">
                                                Marca</th>
                                            <th scope="col"
                                                class="py-3 pl-4 pr-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">
                                                Modelo</th>
                                            <th scope="col"
                                                class="py-3 pl-4 pr-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">
                                                Anio</th>
                                            <th scope="col"
                                                class="py-3 pl-4 pr-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">
                                                Kilometraje</th>
                                            <th scope="col"
                                                class="py-3 pl-4 pr-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">
                                                Cliente</th>
                                            <th scope="col"
                                                class="py-3 pl-4 pr-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">
                                                Estado Vehiculo</th>

                                            <th scope="col"
                                                class="px-3 py-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-gray-200 bg-white">
                                        @foreach ($vehiculos as $vehiculo)
                                            <tr class="even:bg-gray-50">
                                                <td
                                                    class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-semibold text-gray-900">
                                                    {{ ++$i }}</td>

                                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                                    {{ $vehiculo->placa }}</td>
                                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                                    {{ $vehiculo->color }}</td>
                                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                                    {{ $vehiculo->marca }}</td>
                                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                                    {{ $vehiculo->modelo }}</td>
                                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                                    {{ $vehiculo->anio }}</td>
                                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                                    {{ formatearNumero($vehiculo->kilometraje) }} KM</td>
                                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                                    {{ $vehiculo->cliente->nombre }}</td>
                                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                                    {{ $vehiculo->estadoVehiculo->estado }}</td>

                                                <td
                                                    class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900">
                                                    <form action="{{ route('vehiculos.destroy', $vehiculo->id) }}"
                                                        method="POST">
                                                        @if (
                                                            $vehiculo->estado_vehiculo_id == 2 &&
                                                                (Auth::user()->rol->name == 'SuperAdmin' ||
                                                                    Auth::user()->rol->name == 'Administrador' ||
                                                                    Auth::user()->rol->name == 'Técnico de Mecanica'))
                                                            <p
                                                                class="text-gray-600 font-bold hover:text-gray-900  mr-2">
                                                                {{ getEstadoVehiculoType($vehiculo->estado_vehiculo_id) }}
                                                            </p>
                                                        @endif
                                                        @if (
                                                            $vehiculo->estado_vehiculo_id < 6 &&
                                                                $vehiculo->estado_vehiculo_id != 2 &&
                                                                (Auth::user()->rol->name == 'SuperAdmin' ||
                                                                    Auth::user()->rol->name == 'Administrador' ||
                                                                    Auth::user()->rol->name == 'Coordinador Seminuevos'))
                                                            <a href="{{ route('vehiculos.updateEstado', $vehiculo->id) }}"
                                                                class="text-blue-600 font-bold hover:text-blue-900  mr-2">{{ getEstadoVehiculoType($vehiculo->estado_vehiculo_id) }}</a>
                                                        @endif
                                                        @if (
                                                            $vehiculo->estado_vehiculo_id ==1  &&
                                                                (Auth::user()->rol->name == 'SuperAdmin' ||
                                                                    Auth::user()->rol->name == 'Administrador' ||
                                                                    Auth::user()->rol->name == 'Asesor'))
                                                            <a href="{{ route('vehiculos.updateEstado', $vehiculo->id) }}"
                                                                class="text-blue-600 font-bold hover:text-blue-900  mr-2">{{ getEstadoVehiculoType($vehiculo->estado_vehiculo_id) }}</a>
                                                        @endif
                                                       
                                                        @if (
                                                            $vehiculo->estado_vehiculo_id >= 6 &&
                                                                (Auth::user()->rol->name == 'SuperAdmin' ||
                                                                    Auth::user()->rol->name == 'Administrador' ||
                                                                    Auth::user()->rol->name == 'Asesor' ||
                                                                    Auth::user()->rol->name == 'Coordinador Seminuevos'))
                                                            <a href="{{ route('vehiculos.oferta', $vehiculo->id) }}"
                                                                class="text-gray-600 font-bold hover:text-gray-900 mr-2">{{ __('Imprimir') }}</a>
                                                        @endif
                                                       
                                                        @csrf
                                                        @method('DELETE')
                                                        <a href="{{ route('vehiculos.destroy', $vehiculo->id) }}"
                                                            class="text-red-600 font-bold hover:text-red-900"
                                                            onclick="event.preventDefault(); confirm('¿Está seguro de que desea eliminar, este registro?') ? this.closest('form').submit() : false;">{{ __('Eliminar') }}</a>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                                <div class="mt-4 px-4">
                                    {!! $vehiculos->withQueryString()->links() !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
