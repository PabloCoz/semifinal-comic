<div>
    <div class="max-w-5xl mx-auto py-10">
        <div>
            <h1 class="text-3xl font-bold text-center">Mis comics suscritos</h1>
            <div class="mt-10">
                <div class="grid grid-cols-2 md:grid-cols-3 gap-2">
                    @forelse ($comics as $comic)
                        <a href="{{ route('comics.show', $comic) }}"
                            class="overflow-hidden bg-white shadow-md rounded-lg">
                            <div class="px-2 py-6">
                                <img src="{{ Storage::url($comic->image->url) }}" class="rounded-lg">
                                <div class="mt-1">
                                    <h1 class="text-xl font-bold text-center font-josefin">{{ $comic->title }}</h1>
                                </div>
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
