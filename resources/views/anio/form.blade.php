<div class="space-y-6">

    <div>
        <x-label for="anio" :value="__('Anio')"/>
        <x-input id="anio" name="anio" type="text" class="mt-1 block w-full" :value="old('anio', $anio?->anio)" autocomplete="anio" placeholder="Anio"/>
        <x-input-error class="mt-2" for="column"/>
    </div>
    <div>
        <x-label for="descripcion_id" :value="__('Descripción')" />
        <select id="descripcion_id" name="descripcion_id" class="mt-1 block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
            <option value="">-- Seleccione Descripción --</option>
            @foreach ($descripciones as $descripcion)
                <option value="{{ $descripcion->id }}" {{ old('descripcion_id', $anio?->descripcion_id) == $descripcion->id ? 'selected' : '' }}>
                    {{ $descripcion->descripcion }}
                </option>
            @endforeach
        </select>
        <x-input-error class="mt-2" for="descripcion_id" />
    </div>

    <div class="flex items-center gap-4">
        <x-button>Guardar</x-button>
    </div>
</div>
