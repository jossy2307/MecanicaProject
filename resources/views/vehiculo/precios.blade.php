<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $vehiculo->name ?? __('Precio') . ' ' . __('Vehiculo') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-full mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="w-full">
                    <div class="sm:flex sm:items-center">
                        <div class="sm:flex-auto">
                            <h1 class="text-base font-semibold leading-6 text-gray-900">Detalles del {{ __('Vehiculo') }}
                                {{ $vehiculo->placa }}</h1>
                        </div>
                        <div class="mt-4 sm:ml-16 sm:mt-0 sm:flex-none">
                            <a type="button"
                                href="{{ route('vehiculos.index') }}"
                                class="block rounded-md bg-indigo-600 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Regresar</a>
                        </div>
                    </div>
                    <div class="flex flex-col md:flex-row items-center py-6">
                        <div class="w-full max-w-3xl px-4 sm:px-6 lg:px-8">
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
                        <div class="w-full max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
                            <div class="overflow-hidden border border-gray-300 shadow-lg rounded-lg bg-white">
                                <div class="flex flex-col space-y-4 p-6">
                                    @foreach ($detalles as $item)
                                        <form method="POST"
                                            action="{{ route('vehiculo-detalles.update', $item->id) }}"
                                            role="form"
                                            enctype="multipart/form-data"
                                            class="grid grid-cols-12 gap-4 items-center">
                                            {{ method_field('PATCH') }}
                                            @csrf
                                            <p class="font-semibold text-gray-700 col-span-4">
                                                {{ $item->detalle->nombre }}</p>
                                            <p class="text-gray-900 col-span-2">
                                                <span
                                                    class="{{ $item->estado ? 'bg-green-500' : 'bg-red-500' }} text-white px-3 py-1 rounded-full">
                                                    {{ $item->estado ? 'Aprobado' : 'Rechazado' }}
                                                </span>
                                            </p>
                                            <x-input id="id"
                                                name="id"
                                                type="hidden"
                                                :value="old('id', $item->id)" />
                                            @if (!$item->estado)
                                                <x-input id="valor"
                                                    name="valor"
                                                    type="text"
                                                    class="mt-1 block col-span-3"
                                                    :value="old('valor', $item->valor)"
                                                    placeholder="Valor" />
                                                <x-input-error class="m-2 col-span-8"
                                                    for="valor" />
                                                <x-button class="col-span-2">Confirmar</x-button>
                                            @endif
                                        </form>
                                    @endforeach
                                    <div
                                        class="flex justify-between items-center text-start border-t border-slate-200 pt-2">
                                        <p class="font-semibold text-gray-700 w-1/3">Total</p>
                                        <p class="text-gray-900 text-end w-1/3">{{ getTotalPrice($detalles) }}</p>
                                    </div>
                                    <div class="mt-4 sm:ml-16 sm:mt-0 sm:flex justify-end">
                                        <a type="button"
                                            href="{{ route('vehiculos.updateEstado', $vehiculo->id) }}"
                                            class=" rounded-md bg-blue-600 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-blue-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-600">Enviar
                                            Siguiente Fase</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
