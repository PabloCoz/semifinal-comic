<div class="flex items-center justify-start">
    <button wire:click="$set('open', true)"
        class="text-white font-bold uppercase text-sm bg-rose-400 hover:bg-rose-500 px-4 py-3 rounded-full">
        Crear post
    </button>

    <x-dialog-modal wire:model="open">
        <x-slot name="content">
            <h1 class="font-bold uppercase text-lg">Crear nueva publicación</h1>

            <div class="mt-4">
                @if ($img)
                    @foreach ($img as $image)
                        <img src="{{ $image->temporaryUrl() }}" class="w-full h-64 object-cover object-center rounded-lg"
                            loading="lazy">
                    @endforeach
                @endif
            </div>

            <div wire:loading wire:target="img"
                class="bg-red-100 border w-full border-red-400 text-red-700 px-4 py-3 mb-3 rounded relative"
                role="alert">
                <strong class="font-bold">!Imagen Cargando!</strong>
                <span class="block sm:inline">Espere por favor.</span>
            </div>

            <div class="mt-4">
                <textarea wire:model="description" class="w-full rounded-lg" placeholder="Ingrese una breva descripción"></textarea>
                @error('description')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div class="mt-4">
                <label for="{{ $ident }}">
                    <i class="p-3 rounded-full bg-black cursor-pointer text-sm text-white">Selecciona Imagen</i>
                </label>

                <input wire:model="img" id="{{ $ident }}" type="file" class="hidden" multiple
                    enctype="multipart/form-data" accept="image/*" />
            </div>

            <div class="mt-4 flex items-center justify-end">
                <button wire:click="save" class="px-3 py-2 bg-rose-400 rounded-full font-bold text-white">Crear</button>
            </div>

        </x-slot>
    </x-dialog-modal>
</div>
