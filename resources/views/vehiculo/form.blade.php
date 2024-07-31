<div class="space-y-6">

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
            :value="__('Anio')" />
        <x-input id="anio"
            name="anio"
            type="text"
            class="mt-1 block w-full"
            :value="old('anio', $vehiculo?->anio)"
            autocomplete="anio"
            placeholder="Anio" />
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
            for="kilometraje" />
    </div>
    <div>
        <x-label for="estado_vehiculo_id"
            :value="__('Estado Vehiculo Id')" />
        <x-input id="estado_vehiculo_id"
            name="estado_vehiculo_id"
            type="text"
            class="mt-1 block w-full"
            :value="old('estado_vehiculo_id', $vehiculo?->estado_vehiculo_id)"
            autocomplete="estado_vehiculo_id"
            placeholder="Estado Vehiculo Id" />
        <x-input-error class="mt-2"
            for="estado_vehiculo_id" />
    </div>
    <div>
        <x-label for="user_id"
            :value="__('User Id')" />
        <x-input id="user_id"
            name="user_id"
            type="text"
            class="mt-1 block w-full"
            :value="old('user_id', $vehiculo?->user_id)"
            autocomplete="user_id"
            placeholder="User Id" />
        <x-input-error class="mt-2" for="user_id" />
    </div>

    <div class="flex items-center gap-4">
        <x-button>Submit</x-button>
    </div>
</div>
