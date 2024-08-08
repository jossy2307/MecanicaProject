<div class="space-y-6">

    <div>
        <x-label for="nombre" :value="__('Nombre')"/>
        <x-input id="nombre" name="nombre" type="text" class="mt-1 block w-full" :value="old('nombre', $cliente?->nombre)" autocomplete="nombre" placeholder="Nombre"/>
        <x-input-error class="mt-2" for="nombre"/>
    </div>
    <div>
        <x-label for="cedula" :value="__('Cedula')"/>
        <x-input id="cedula" name="cedula" type="text" class="mt-1 block w-full" :value="old('cedula', $cliente?->cedula)" autocomplete="cedula" placeholder="Cedula"/>
        <x-input-error class="mt-2" for="cedula"/>
    </div>
    <div>
        <x-label for="telefono" :value="__('Telefono')"/>
        <x-input id="telefono" name="telefono" type="text" class="mt-1 block w-full" :value="old('telefono', $cliente?->telefono)" autocomplete="telefono" placeholder="Telefono"/>
        <x-input-error class="mt-2" for="telefono"/>
    </div>
    <div>
        <x-label for="email" :value="__('Email')"/>
        <x-input id="email" name="email" type="text" class="mt-1 block w-full" :value="old('email', $cliente?->email)" autocomplete="email" placeholder="Email"/>
        <x-input-error class="mt-2" for="email"/>
    </div>
    <div>
        <x-label for="direccion" :value="__('Direccion')"/>
        <x-input id="direccion" name="direccion" type="text" class="mt-1 block w-full" :value="old('direccion', $cliente?->direccion)" autocomplete="direccion" placeholder="Direccion"/>
        <x-input-error class="mt-2" for="direccion"/>
    </div>

    <div>
        <x-label for="empresa_id" :value="__('Seleccione la empresa')"/>
        <select id="empresa_id" name="empresa_id" class="mt-1 block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
            <option value="">-- Seleccione --</option>
            @foreach ($empresas as $empresa)
                <option value="{{ $empresa->id }}">{{ $empresa->nombre }}</option>
            @endforeach
        </select>
        <x-input-error class="mt-2" for="empresa_id"/>
    </div>
    <div class="flex items-center gap-4">
        <x-button>Guardar</x-button>
    </div>
</div>
