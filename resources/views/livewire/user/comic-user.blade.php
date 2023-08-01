<div>
    <div class="max-w-5xl mx-auto py-10">
        <div>
            <h1 class="text-3xl font-bold text-center text-white font-josefin">Mis comics suscritos</h1>
            <div class="mt-10">
                <div class="grid grid-cols-2 md:grid-cols-4 gap-2">
                    @forelse ($comics as $comic)
                        <a href="{{ route('comics.status', $comic) }}">
                            <div class="flex justify-center items-center relative">
                                <figure class="md:rounded-md shadow-md overflow-hidden">
                                    <img class="h-72 object-center object-cover w-full"
                                        src="{{ Storage::url($comic->image->url) }}" alt="" loading="lazy">
                                </figure>
                                <div class="absolute top-1 left-2 bg-yellow-500 px-1 py-0.5 rounded-lg">
                                    <h1 class="font-josefin font-bold">{{ $comic->category->name }}
                                    </h1>
                                </div>
                                <div class="absolute top-1 right-2 bg-rose-600 text-white px-1 py-1 rounded-lg">
                                    <div class="font-josefin font-bold flex items-center">
                                        <button>
                                            <i class="fa-solid fa-eye"></i>
                                        </button>
                                        <p class="ml-0.5">{{ $comic->users->count() }}</p>
                                    </div>
                                </div>
                            </div>

                            <div>
                                <h1 class="font-josefin text-skcomic uppercase text-center font-bold">
                                    {{ Str::limit($comic->title, 36, '...') }}</h1>
                                <p class="text-sm text-white text-justify font-semibold">
                                    {{ Str::limit($comic->description, 50, '...') }}</p>
                            </div>
                        </a>
                    @empty
                        <div class="px-2 py-6 col-span-2 md:col-span-3">
                            <h1 class="text-xl font-bold text-center font-josefin">No hay comics suscritos</h1>
                        </div>
                        <div class="flex items-center justify-center col-span-2 md:col-span-3">
                            <a href="{{ route('comics.index') }}"
                                class="px-4 py-2 text-white bg-rose-500 rounded-md hover:bg-rose-600 font-bold font-josefin">Ingresa
                                aqui y
                                suscribete a tus comics favoritos
                            </a>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>
