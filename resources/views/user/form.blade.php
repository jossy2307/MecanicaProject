<div class="space-y-6">
    
    <div>
        <x-input-label for="nombre" :value="__('Nombre')"/>
        <x-text-input id="nombre" name="nombre" type="text" class="mt-1 block w-full" :value="old('nombre', $user?->nombre)" autocomplete="nombre" placeholder="Nombre"/>
        <x-input-error class="mt-2" :messages="$errors->get('nombre')"/>
    </div>
    <div>
        <x-input-label for="email" :value="__('Email')"/>
        <x-text-input id="email" name="email" type="text" class="mt-1 block w-full" :value="old('email', $user?->email)" autocomplete="email" placeholder="Email"/>
        <x-input-error class="mt-2" :messages="$errors->get('email')"/>
    </div>
    <div>
        <x-input-label for="url_imagen" :value="__('Url Imagen')"/>
        <x-text-input id="url_imagen" name="url_imagen" type="text" class="mt-1 block w-full" :value="old('url_imagen', $user?->url_imagen)" autocomplete="url_imagen" placeholder="Url Imagen"/>
        <x-input-error class="mt-2" :messages="$errors->get('url_imagen')"/>
    </div>
    <div>
        <x-input-label for="rol_id" :value="__('Rol Id')"/>
        <x-text-input id="rol_id" name="rol_id" type="text" class="mt-1 block w-full" :value="old('rol_id', $user?->rol_id)" autocomplete="rol_id" placeholder="Rol Id"/>
        <x-input-error class="mt-2" :messages="$errors->get('rol_id')"/>
    </div>

    <div class="flex items-center gap-4">
        <x-primary-button>Submit</x-primary-button>
    </div>
</div>