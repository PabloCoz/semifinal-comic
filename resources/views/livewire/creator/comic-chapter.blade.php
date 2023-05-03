<div>
    <h1 class="font-bold text-2xl">CAPÍTULOS</h1>
    <hr class="mt-2 mb-6">
    <div x-data="{ open: false }" class="mb-3">
        <a x-show="!open" @click="open = true" class="flex items-center cursor-pointer">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>

            <h3 class="text-sm uppercase font-bold">Agregar Capítulos</h3>
        </a>

        <article class="overflow-hidden shadow-md rounded-lg mt-2" x-show="open">
            <div class="px-6 py-4 bg-gray-100">
                <h1 class="text-xl font-bold mb-4">Agregar nuevo capítulo</h1>

                <div>
                    <input wire:model="name" type="text" class="w-full rounded"
                        placeholder="Escriba el nombre del capítulo">

                    @error('name')
                        <span class="text-xs text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <div class="flex justify-end mt-2">
                    <button class="block p-2 rounded-full text-white font-bold bg-red-600"
                        @click="open = false">Cancelar</button>
                    <button class="block p-2 rounded-full text-white font-bold bg-blue-600 ml-2"
                        wire:click="store">Agregar</button>
                </div>
            </div>
        </article>
    </div>
    <section id="posts">
        @foreach ($this->chapters as $item)
            <article class="bg-gray-200 overflow-hidden rounded-lg shadow-md mb-6" data-id="{{ $item->id }}"
                x-data="{ img: false }">
                <div class="px-6 py-4">
                    @if ($chapter['id'] == $item->id)
                        <form wire:submit.prevent="update">
                            <input wire:model="chapter.name" type="text" class="w-full rounded-lg"
                                placeholder="Ingrese nombre del módulo">

                            @error('chapter.name')
                                <span class="text-xs text-red-500">{{ $message }}</span>
                            @enderror
                        </form>
                    @else
                        <header class="flex items-center justify-between cursor-grab">
                            <h1>{{ $item->position }}. {{ $item->name }}</h1>
                            <div class="flex items-center">
                                <button wire:click="edit({{ $item }})">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-green-600">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                    </svg>
                                </button>
                                <button wire:click="delete({{ $item }})">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-red-600">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                    </svg>
                                </button>
                                <a href="{{ route('creator.comics.images', $item) }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-violet-500">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 001.5-1.5V6a1.5 1.5 0 00-1.5-1.5H3.75A1.5 1.5 0 002.25 6v12a1.5 1.5 0 001.5 1.5zm10.5-11.25h.008v.008h-.008V8.25zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
                                    </svg>
                                </a>
                            </div>
                        </header>
                    @endif
                </div>
            </article>
        @endforeach
    </section>


    @push('sortable')
        <script src="https://cdn.jsdelivr.net/npm/sortablejs@latest/Sortable.min.js"></script>
        <script>
            new Sortable(posts, {
                handle: '.cursor-grab',
                animation: 150,
                ghostClass: 'bg-blue-300',
                store: {
                    set: function(sortable) {
                        const sorts = sortable.toArray();
                        axios.post("{{ route('api.order.chapter') }}", {
                            sorts: sorts,
                        });
                    }
                }
            });
        </script>
    @endpush
</div>
