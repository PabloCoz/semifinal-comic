<div>
    <button class="focus:outline-none" wire:click="$set('open', true)">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
            class="w-6 h-6 hover:text-green-400">
            <path
                d="M21.731 2.269a2.625 2.625 0 00-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 000-3.712zM19.513 8.199l-3.712-3.712-8.4 8.4a5.25 5.25 0 00-1.32 2.214l-.8 2.685a.75.75 0 00.933.933l2.685-.8a5.25 5.25 0 002.214-1.32l8.4-8.4z" />
            <path
                d="M5.25 5.25a3 3 0 00-3 3v10.5a3 3 0 003 3h10.5a3 3 0 003-3V13.5a.75.75 0 00-1.5 0v5.25a1.5 1.5 0 01-1.5 1.5H5.25a1.5 1.5 0 01-1.5-1.5V8.25a1.5 1.5 0 011.5-1.5h5.25a.75.75 0 000-1.5H5.25z" />
        </svg>
    </button>

    <x-dialog-modal wire:model="open">
        <x-slot name="content">
            <h1 class="font-bold uppercase text-lg">Actualizar publicación</h1>

            <div class="mt-4">
                @if ($img)
                    @foreach ($img as $image)
                        <img src="{{ $image->temporaryUrl() }}"
                            class="w-full h-64 object-cover object-center rounded-lg" loading="lazy">
                    @endforeach
                @else
                    @foreach ($images as $image)
                        <img src="{{ Storage::url($image->url) }}"
                            class="w-full h-64 object-cover object-center rounded-lg" loading="lazy">
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
                <textarea wire:model="post.description" class="w-full rounded-lg" placeholder="Ingrese una breva descripción"></textarea>
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
                <button wire:click="save" class="px-3 py-2 bg-rose-400 rounded-full font-bold text-white">Actualizar post</button>
            </div>

        </x-slot>
    </x-dialog-modal>
</div>
