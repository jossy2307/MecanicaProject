<div class="space-y-6">

    <div>
        <x-label for="nombre"
            :value="__('Nombre')" />
        <x-input id="nombre"
            name="nombre"
            type="text"
            class="mt-1 block w-full"
            :value="old('nombre', $cliente?->nombre)"
            autocomplete="nombre"
            placeholder="Nombre" />
        <x-input-error for="nombre"
            class="mt-2" />
    </div>
    <div>
        <x-label for="cedula"
            :value="__('Cedula')" />
        <x-input id="cedula"
            name="cedula"
            type="text"
            class="mt-1 block w-full"
            :value="old('cedula', $cliente?->cedula)"
            autocomplete="cedula"
            placeholder="Cedula" />

        <x-input-error for="cedula"
            class="mt-2" />
    </div>
    <div>
        <x-label for="telefono"
            :value="__('Telefono')" />
        <x-input id="telefono"
            name="telefono"
            type="text"
            class="mt-1 block w-full"
            :value="old('telefono', $cliente?->telefono)"
            autocomplete="telefono"
            placeholder="Telefono" />

        <x-input-error for="telefono"
            class="mt-2" />
    </div>
    <div>
        <x-label for="email"
            :value="__('Email')" />
        <x-input id="email"
            name="email"
            type="text"
            class="mt-1 block w-full"
            :value="old('email', $cliente?->email)"
            autocomplete="email"
            placeholder="Email" />

        <x-input-error for="email"
            class="mt-2" />
    </div>
    <div>
        <x-label for="direccion"
            :value="__('Direccion')" />
        <x-input id="direccion"
            name="direccion"
            type="text"
            class="mt-1 block w-full"
            :value="old('direccion', $cliente?->direccion)"
            autocomplete="direccion"
            placeholder="Direccion" />

        <x-input-error for="direccion"
            class="mt-2" />
    </div>

    <div class="flex items-center gap-4">
        <x-button>Submit</x-button>
    </div>
</div>
