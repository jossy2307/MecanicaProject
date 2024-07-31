<div class="space-y-6">

    <div>
        <x-label for="name"
            :value="__('Name')" />
        <x-input id="name"
            name="name"
            type="text"
            class="mt-1 block w-full"
            :value="old('name', $role?->name)"
            placeholder="Name"
            autocomplete="name" />
        @if ($errors->get('name'))
            <div class="mt-1 text-red-500 text-sm">{{ $errors->get('name') }}</div>
        @endif

    </div>

    <div class="flex items-center gap-4">
        <x-button>Submit</x-button>
    </div>
</div>
