<div class="space-y-6">
    <div>
        <x-label for="cliente_id"
            :value="__('Clientes')" />
        <select name="cliente_id"
            class="mt-1 block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
            id="cliente_id">
            <option value="">-- Seleccione --</option>
            @foreach ($clientes as $cliente)
                <option value="{{ $cliente->id }}">{{ $cliente->nombre }} {{$cliente->apellido}}</option>
            @endforeach

        </select>
        <x-input-error class="mt-2"
            for="cliente_id" />
    </div>

    <div>
        <x-label for="placa"
            :value="__('Placa')" />
        <x-input id="placa"
            name="placa"
            type="text"
            class="mt-1 block w-full"
            :value="old('placa', $vehiculo?->placa)"
            autocomplete="placa"
            placeholder="Placa" />
        <x-input-error class="mt-2"
            for="placa" />
    </div>
    <div>
        <x-label for="color"
            :value="__('Color')" />
        <x-input id="color"
            name="color"
            type="text"
            class="mt-1 block w-full"
            :value="old('color', $vehiculo?->color)"
            autocomplete="color"
            placeholder="Color" />
        <x-input-error class="mt-2"
            for="color" />
    </div>
    <div>
        <x-label for="marca"
            :value="__('Marca')" />
        <x-input id="marca"
            name="marca"
            type="text"
            class="mt-1 block w-full"
            :value="old('marca', $vehiculo?->marca)"
            autocomplete="marca"
            placeholder="Marca" />
        <x-input-error class="mt-2"
            for="marca" />
    </div>
    <div>
        <x-label for="modelo"
            :value="__('Modelo')" />
        <x-input id="modelo"
            name="modelo"
            type="text"
            class="mt-1 block w-full"
            :value="old('modelo', $vehiculo?->modelo)"
            autocomplete="modelo"
            placeholder="Modelo" />
        <x-input-error class="mt-2"
            for="modelo" />
    </div>
    <div>
        <x-label for="anio"
            :value="__('Año')" />
        <x-input id="anio"
            name="anio"
            type="text"
            class="mt-1 block w-full"
            :value="old('anio', $vehiculo?->anio)"
            autocomplete="anio"
            placeholder="Año" />
        <x-input-error class="mt-2"
            for="anio" />
    </div>
    <div>
        <x-label for="kilometraje"
            :value="__('Kilometraje')" />
        <x-input id="kilometraje"
            name="kilometraje"
            type="text"
            class="mt-1 block w-full"
            :value="old('kilometraje', $vehiculo?->kilometraje)"
            autocomplete="kilometraje"
            placeholder="Kilometraje" />
        <x-input-error class="mt-2"
            for="Kilometraje" />
    </div>

    <div class="flex items-center gap-4">
        <x-button>Guardar</x-button>
    </div>
</div>
