<div>
    <div class="max-w-4xl mx-auto p-8 bg-white rounded-lg overflow-hidden">
        <h1 class="font-bold text-2xl uppercase">{{ $chapter->name }}</h1>
        <hr class="mt-2 mb-6">

        {{-- <div class="flex items-center justify-between">
            <div>
                <h1 class="font-bold text-xl">Subir imagen de Portada</h1>
                <p class="font-bold text-sm italic text-blue-600">Medidas: Subir imagenes de manera vertical</p>
            </div>
            <div>
                <div>
                    <label for="{{ $ide }}" class="flex items-center bg-blue-300 p-2 rounded-full">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <h1 class="mx-1 font-bold">Subir imagen de portada</h1>
                    </label>

                    <input wire:model="image" id="{{ $ide }}" type="file" class="hidden" accept="image/*" />
                </div>
                @if ($image && $image->isValid())
                    <div class="mt-2">
                        <button wire:click="store" class="bg-rose-500 text-white font-bold rounded-full p-2">
                            Actualizar imagen de portada
                        </button>
                    </div>
                @endif
            </div>
        </div>

        <div class="my-4">
            @if ($image)
                <img class="h-96 w-full object-contain object-center" src="{{ $image->temporaryUrl() }}" alt=""
                    loading="lazy">
            @else
                <img class="h-96 w-full object-contain object-center" src="{{ Storage::url($chapter->image) }}"
                    alt="" loading="lazy">
            @endif
        </div> --}}
        <div class="mt-6">
            <h1 class="font-bold text-xl">Imagenes</h1>
            <p>
                Sube las imagenes de tu capitulo, puedes subir varias imagenes a la vez, para cambiar el orden de las
                imagenes solo arrastra la imagen a la posicion que desees.
            </p>
            <div class="block md:flex items-center justify-between p-2">
                <div>
                    <div wire:click="addImages" class="@if ($img) hidden @endif cursor-pointer">
                        <label for="{{ $ident }}"
                            class="flex items-center bg-violet-300 p-2 rounded-full cursor-pointer">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <h1 class="mx-1 font-bold">Subir imagenes</h1>
                        </label>

                        <input wire:model="img" id="{{ $ident }}" type="file" class="hidden" multiple
                            enctype="multipart/form-data" accept="image/*" />
                    </div>
                </div>
                <div class="flex items-center space-x-1">
                    @if (count($itm))
                        <button wire:click="deleteImage" wire:loading.remove wire:target="deleteImage"
                            class="bg-red-500 text-white font-bold rounded-full p-2 text-sm uppercase">
                            Eliminar
                        </button>
                    @endif
                    <button wire:click="createImages" wire:loading.remove wire:target="createImages"
                        @if (!$img) disabled @endif
                        class="rounded-full p-2 text-white bg-green-500 font-bold text-sm tracking-wider">ACEPTAR</button>

                </div>
            </div>

            <div class="overflow-auto rounded-lg shadow-lg h-[calc(100vh-14rem)] bg-gray-100">
                <div class="p-3">
                    <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-3" id="images">
                        <div class="flex items-center justify-center col-span-4" wire:loading wire:target="img">
                            <div class="animate-spin rounded-full h-32 w-32 border-t-2 border-b-2 border-gray-900">
                            </div>
                        </div>
                        @if ($img)
                            @foreach ($img as $index => $ima)
                                <div class="relative inline-block bg-slate-200 rounded-lg w-40 h-48">
                                    <img class="rounded-lg object-contain object-center border-2 border-violet-400 border-dashed w-40 h-48"
                                        src="{{ $ima->temporaryUrl() }}" loading="lazy" alt="">
                                    <span
                                        class="cursor-pointer absolute top-0 right-0 inline-flex items-center justify-center h-6 w-6 text-xs font-bold leading-none text-white border-2 transform translate-x-1/2 -translate-y-1/2 bg-red-600 rounded-full"
                                        wire:click="removeImage({{ $index }})">X</span>
                                </div>
                            @endforeach
                        @endif

                        @foreach ($this->images as $key => $image)
                            <div class="relative inline-block bg-slate-200 rounded-lg w-40 h-48 cursor-grab"
                                data-id="{{ $image->id }}">
                                <img src="{{ Storage::url($image->url) }}" alt=""
                                    class="rounded-lg w-40 h-48 object-contain object-center border-2 border-gray-400"
                                    loading="lazy">
                                <div class="absolute top-0 right-2">
                                    {{-- <span wire:click="deleteImage({{ $image->id }})"
                                        class="cursor-pointer absolute top-0 right-0 inline-flex items-center justify-center h-6 w-6 text-xs font-bold leading-none text-white border-2 transform translate-x-1/2 -translate-y-1/2 bg-red-600 rounded-full">X</span> --}}
                                    <input type="checkbox" value="{{ $image->id }}"
                                        wire:click="toggleSelection({{ $image->id }})"
                                        class="text-rose-600 bg-gray-100 rounded focus:ring-0">
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="flex justify-end mt-4">
            <div>
                @error('img.*')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>
            <button wire:click="back" class="bg-black text-white font-bold p-2 rounded-full uppercase text-sm">Volver al
                menu</button>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/sortablejs@latest/Sortable.min.js"></script>
    <script>
        new Sortable(images, {
            handle: '.cursor-grab',
            animation: 150,
            ghostClass: 'bg-red-400',
            store: {
                set: function(sortable) {
                    const orders = sortable.toArray();
                    console.log(orders);
                    axios.post("{{ route('api.order.image') }}", {
                        orders: orders,
                    });
                }
            }
        });
    </script>

</div>
