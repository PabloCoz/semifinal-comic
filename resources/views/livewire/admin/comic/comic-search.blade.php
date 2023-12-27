<div>
    <div>
        <h1 class="text-2xl font-bold">Lista de comics</h1>
        <hr class="my-5 border border-gray-200">
    </div>

    <div class="flex justify-between">
        <input wire:model="search" wire:keydown="clearPage" type="search" class="w-full rounded-lg my-4 flex-1 shadow-sm"
            placeholder="Ingrese el nombre de un comic...">
    </div>

    <div>
        <div class="bg-gray-200 py-4 ">
            <div class="block md:flex space-y-3 md:space-y-0 space-x-0 md:space-x-4 mx-3">
                <div>
                    <button wire:click="resetFilters"
                        class="bg-white shadow h-12 px-4 rounded-lg text-gray-700 focus:outline-none w-full md:w-20 lg:w-40">
                        <i class="fas fa-archway text-xs mr-2"></i>
                        Todos los comics
                    </button>
                </div>



                <div class="relative z-40" x-data="{ open: false }">
                    <button @click="open = !open " @click.away="open = false"
                        class="block h-12 overflow-hidden bg-white shadown rounded-lg focus:outline-none px-4 text-gray-700 w-full md:w-40">
                        <i class="fas fa-tags text-xs ml-2"></i>
                        Categorias
                        <i class="fas fa-angle-down text-xs ml-2"></i>
                    </button>
                    <!-- Dropdown Body -->
                    <div x-show="open" class="absolute right-0 w-40 mt-2 py-2 bg-white border rounded shadow-xl">
                        @foreach ($this->categories as $category)
                            <a wire:click="$set('category_id', {{ $category->id }})"
                                class="transition-colors capitalize duration-200 block px-4 py-2 text-normal text-gray-900 rounded hover:bg-blue-300 cursor-pointer">
                                {{ $category->name }}
                            </a>
                        @endforeach
                    </div>
                </div>

                <div class="relative z-30" x-data="{ open: false }">
                    <button @click="open = !open " @click.away="open = false"
                        class="block h-12 overflow-hidden bg-white shadown rounded-lg focus:outline-none px-4 text-gray-700 w-full">
                        <i class="fa-solid fa-layer-group text-xs ml-2"></i>
                        Estado
                        <i class="fas fa-angle-down text-xs ml-2"></i>
                    </button>
                    <!-- Dropdown Body -->
                    <div x-show="open" class="absolute right-0 w-40 mt-2 py-2 bg-white border rounded shadow-xl">

                        <a wire:click="$set('status', 1)"
                            class="transition-colors duration-200 block px-4 py-2 text-normal text-gray-900 rounded hover:bg-blue-300 cursor-pointer">
                            ELABORACIÓN
                        </a>

                        <a wire:click="$set('status', 2)"
                            class="transition-colors duration-200 block px-4 py-2 text-normal text-gray-900 rounded hover:bg-blue-300 cursor-pointer">
                            REVISIÓN
                        </a>

                        <a wire:click="$set('status', 3)"
                            class="transition-colors duration-200 block px-4 py-2 text-normal text-gray-900 rounded hover:bg-blue-300 cursor-pointer">
                            PUBLICADO

                        </a>

                        <a wire:click="$set('status', 4)"
                            class="transition-colors duration-200 block px-4 py-2 text-normal text-gray-900 rounded hover:bg-blue-300 cursor-pointer">
                            STANDBY
                        </a>

                    </div>
                </div>
            </div>
        </div>

        <div
            class="px-4 sm:px-6 lg:px-8 py-10 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 lg:grid-cols-5 gap-x-8 gap-y-8">
            @forelse ($comics as $comic)
                <div class="mx-1 md:mx-0">
                    <div class="flex justify-center items-center relative">
                        <figure class="shadow-md overflow-hidden">
                            <img class="h-72 object-center object-cover w-full" src="{{ Storage::url($comic->img) }}"
                                loading="lazy">
                        </figure>
                        <div class="absolute top-1 left-2 px-1 py-0.5 rounded-lg"
                            style="background-color: {{ $comic->category->color }};
                                        color: {{ $comic->category->color_text }}">
                            <h1 class="font-josefin font-bold">{{ $comic->category->name }}
                            </h1>
                        </div>
                        <div class="absolute top-1 right-2 bg-rose-600 text-white px-1 py-0.5 rounded-lg">
                            <div class="font-josefin font-bold flex items-center">
                                <button>
                                    <i class="fa-solid fa-eye"></i>
                                </button>
                                <p class="ml-0.5">{{ $comic->users->count() }}</p>
                            </div>
                        </div>
                    </div>

                    <div>
                        <h1 class="font-josefin text-skcomic uppercase text-center font-bold mt-3">
                            {{ Str::limit($comic->title, 36, '...') }}</h1>
                        <p class="text-sm text-white text-justify font-semibold">
                            {{ Str::limit($comic->description, 50, '...') }}
                        </p>
                    </div>

                </div>
            @empty
                <div class="font-bold">
                    No se encotraron resultados...
                </div>
            @endforelse
        </div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-4 mb-8">
            {{ $comics->links() }}
        </div>

    </div>
</div>
