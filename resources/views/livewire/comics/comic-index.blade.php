<section class="bg-black py-4">
    <div class="max-w-6xl mx-auto">
        <div>
            <h1 class="font-josefin text-2xl uppercase text-skcomic font-bold text-center my-8">originales de baps
                comics
            </h1>
            <x-multiple-card :comics="$originals" />
        </div>

        <hr class="my-4 border-2 border-dashed">
        <div>
            <h1 class="font-josefin text-2xl uppercase text-rosecomic font-bold text-center my-4">comics sugeridos
            </h1>
            <div class="grid grid-cols-1 lg:grid-cols-8 gap-2 lg:mx-3">
                <div class="lg:col-span-2">
                    <div class="mx-1 md:mx-0">
                        <input type="search" class="w-full rounded-lg" placeholder="Buscar..." wire:model="search">
                    </div>
                    <div class="mt-3 mx-1 md:mx-0" x-data="{ cat: false }">
                        <button @click="cat=!cat"
                            class="flex items-center justify-between w-full p-2 rounded-lg bg-gray-300">
                            <h1 class="text-lg font-bold font-josefin">Categorias</h1>
                            <i class="fa-solid fa-caret-down"></i>

                        </button>
                        <ul class="text-white" x-show="cat">
                            @foreach ($this->categories as $category)
                                <a wire:click="$set('cate', {{ $category->id }})"
                                    class="transition-colors my-2  duration-200 block px-4 py-2 capitalize text-normal rounded hover:bg-blue-300 cursor-pointer
                                    @if ($cate == $category->id) bg-rosecomic @else bg-gray-800 @endif">
                                    {{ $category->name }}
                                </a>
                            @endforeach
                        </ul>

                        <div class="mt-4">
                            <button wire:click="resetFilters" wire:click="$emit('launchEvents')"
                                class="w-full p-2 rounded-lg bg-rosecomic text-white font-bold font-josefin">
                                Limpiar Filtros
                            </button>
                        </div>
                    </div>

                </div>
                <div class="lg:col-span-6">
                    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-1 md:gap-4">
                        @forelse ($comics as $comic)
                            <x-card-comic :comic="$comic" />
                        @empty
                            <div class="text-white">
                                No se encotraron resultados...
                            </div>
                        @endforelse
                    </div>
                </div>
                <div>
                    {{ $comics->links() }}
                </div>
            </div>
        </div>
    </div>
</section>
