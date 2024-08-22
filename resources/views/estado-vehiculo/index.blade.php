<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Estado Vehiculos') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-full mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="w-full">
                    <div class="sm:flex sm:items-center">
                        <div class="sm:flex-auto">
                            <h1 class="text-base font-semibold leading-6 text-gray-900">{{ __('Estado Vehiculos') }}</h1>
                            <p class="mt-2 text-sm text-gray-700">Lista de todos los {{ __('Estado Vehiculos') }}.</p>
                        </div>
                        <div class="mt-4 sm:ml-16 sm:mt-0 sm:flex-none">
                            <a type="button"
                                href="{{ route('estado-vehiculos.create') }}"
                                class="block rounded-md bg-indigo-600 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Nuevo
                                Registro</a>
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
                                                Estado</th>

                                            <th scope="col"
                                                class="px-3 py-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-gray-200 bg-white">
                                        @foreach ($estadoVehiculos as $estadoVehiculo)
                                            <tr class="even:bg-gray-50">
                                                <td
                                                    class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-semibold text-gray-900">
                                                    {{ ++$i }}</td>

                                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                                    {{ $estadoVehiculo->estado }}</td>

                                                <td
                                                    class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900">
                                                    <form
                                                        action="{{ route('estado-vehiculos.destroy', $estadoVehiculo->id) }}"
                                                        method="POST">
                                                        <a href="{{ route('estado-vehiculos.show', $estadoVehiculo->id) }}"
                                                            class="text-gray-600 font-bold hover:text-gray-900 mr-2">{{ __('Ver') }}</a>
                                                        <a href="{{ route('estado-vehiculos.edit', $estadoVehiculo->id) }}"
                                                            class="text-indigo-600 font-bold hover:text-indigo-900  mr-2">{{ __('Editar') }}</a>
                                                        @csrf
                                                        @method('DELETE')
                                                        <a href="#"
                                                            class="text-red-600 font-bold hover:text-red-900">{{ __('Eliminar') }}</a>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div id="confirmModal"
                                    class="hidden fixed inset-0 z-50  items-center justify-center">
                                    <div class="bg-white p-6 rounded-lg shadow-lg">
                                        <h2 class="text-lg font-bold">¿Está seguro de que desea eliminar este registro?
                                        </h2>
                                        <div class="mt-4 flex justify-end">
                                            <button id="cancelButton"
                                                class="bg-gray-300 px-4 py-2 rounded mr-2">Cancelar</button>
                                            <button id="confirmButton"
                                                class="bg-red-500 text-white px-4 py-2 rounded">Eliminar</button>
                                        </div>
                                    </div>
                                    <div class="fixed inset-0 bg-black opacity-50 -z-50"></div>
                                </div>
                                <div class="mt-4 px-4">
                                    {!! $estadoVehiculos->withQueryString()->links() !!}
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
            const modal = document.getElementById('confirmModal');
            const cancelButton = document.getElementById('cancelButton');
            const confirmButton = document.getElementById('confirmButton');
            let formToSubmit = null;

            document.querySelectorAll('.delete-button').forEach(button => {
                button.addEventListener('click', function(event) {
                    event.preventDefault();
                    formToSubmit = button.closest('form');
                    modal.classList.remove('hidden');
                    modal.classList.add('flex');
                });
            });

            cancelButton.addEventListener('click', function() {
                modal.classList.add('hidden');
            });

            confirmButton.addEventListener('click', function() {
                if (formToSubmit) {
                    formToSubmit.submit();
                }
            });
        });
    </script>
</x-app-layout>
