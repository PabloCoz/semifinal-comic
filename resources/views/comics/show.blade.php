<x-app-layout>
    <div class=py-8" style="background-color: {{ $comic->category->color }}">
        <div class="max-w-5xl mx-auto px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-5 lg:grid-cols-7 gap-4 py-10">
                <div
                    class="md:col-start-1 md:col-end-3 @if (!$comic->image) lg:col-start-2 lg:col-end-4 @else lg:col-start-1 lg:col-end-5 @endif">
                    <figure class="">
                        @if (!$comic->image)
                            <img src="{{ Storage::url($comic->img) }}"
                                class="object-cover object-center h-80 w-full md:h-96 md:w-wull rounded-md"
                                loading="lazy">
                        @else
                            <img src="{{ Storage::url($comic->image->url) }}"
                                class="object-cover object-center h-80 w-full md:w-full rounded-md" loading="lazy">
                        @endif
                    </figure>
                </div>
                <div
                    class="md:col-span-2 md:col-start-4 md:col-end-5  lg:col-span-3 lg:col-start-5 flex items-center justify-center">
                    <div class="">
                        <div>
                            <h1 class="text-3xl font-extrabold font-josefin uppercase text-center"
                                style="color: {{ $comic->category->color_text }} ">
                                {{ $comic->title }}</h1>
                            <p
                                class="md:text-xl font-bold font-josefin mt-3 mx-3 text-center"style="color: {{ $comic->category->color_text }} ">
                                Creado por: <a href="{{ route('users.show', $comic->user) }}"
                                    class="uppercase hover:underline">{{ $comic->user->username }}</a>
                            </p>
                        </div>
                        <div class="flex items-center justify-center space-x-5 mt-4">
                            <section class="flex items-center">
                                <button class=" bg-white rounded-full h-9 w-9">
                                    <i class="fa-solid fa-users"></i>
                                </button>

                                <h1 class="ml-1 font-bold font-josefin" style="color: {{ $comic->category->color_text }} ">{{ $comic->users->count() }}</h1>
                            </section>

                            <section class="flex items-center">
                                <button class=" bg-white rounded-full h-9 w-9">
                                    <i class="fa-regular fa-star"></i>
                                </button>

                                <h1 class="ml-1 font-bold font-josefin"  style="color: {{ $comic->category->color_text }} ">
                                    {{ round($comic->ratings->avg('value'), 2) }}
                                </h1>
                            </section>
                            <section class="flex items-center">
                                <button class=" bg-white rounded-full w-9 h-9">
                                    <i class="fa-regular fa-eye"></i>
                                </button>

                                <h1 class="ml-1 font-bold font-josefin"  style="color: {{ $comic->category->color_text }} ">{{ $comic->users->count() }}</h1>
                            </section>

                        </div>
                        <div class="flex justify-center mt-4">
                            <div>
                                @can('enrolled', $comic)
                                    @livewire('comics.comic-rating', ['comic' => $comic])
                                @endcan
                            </div>
                        </div>
                        <div class="flex items-center justify-center mt-10">
                            @auth
                                @can('enrolled', $comic)
                                    <a href="{{ route('comics.status', $comic) }}"
                                        class="rounded-full p-3 bg-rose-600 text-white font-bold font-josefin">
                                        Leer Ahora!
                                    </a>
                                @else
                                    <form action="{{ route('comics.enrolled', $comic) }}" method="POST">
                                        @csrf
                                        <button type="submit"
                                            class="rounded-full p-3 bg-rose-600 text-white font-bold font-josefin uppercase tracking-widest">
                                            Seguir
                                        </button>
                                    </form>
                                @endcan
                            @else
                                <button onclick="openModal()"
                                    class="rounded-full p-3 bg-rose-600 text-white font-bold font-josefin uppercase tracking-widest">
                                    Seguir
                                </button>
                            @endauth
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="bg-gray-50">
        <div class="max-w-5xl mx-auto px-2 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-8 gap-3 py-14">
                <div class="col-span-5 order-2 md:order-1">
                    <div class="">
                        <h1 class="text-lg uppercase tracking-wider font-bold">Capítulos:</h1>
                        <div class="mx-1 md:mx-6">
                            @livewire('chapters.chapter-index', ['comic' => $comic])
                        </div>
                    </div>
                </div>

                <div class="col-span-3 order-1 md:order-2">
                    <h1 class="text-lg uppercase tracking-wider font-bold">Descripción:</h1>
                    <p class="text-gray-600 mt-2 text-justify" id="text"></p>
                    <button id="button" class="font-bold hover:underline">
                        Ver mas
                    </button>
                </div>
            </div>
        </div>
    </div>


    <div>
        <x-footer />
    </div>

    <script>
        const button = document.getElementById('button');
        const text = "<?php echo $comic->description; ?>"
        const newText = text.slice(0, 100);
        document.getElementById('text').innerHTML = newText;

        button.addEventListener('click', () => {

            if (button.innerHTML == 'Ver mas') {
                document.getElementById('text').innerHTML = text;
                button.innerHTML = 'Ver menos';
            } else {
                document.getElementById('text').innerHTML = newText;
                button.innerHTML = 'Ver mas';
            }
        })
    </script>
    @push('open')
        <script>
            function openModal() {
                Livewire.emitTo('modals', 'openModal');
            }
        </script>
    @endpush
</x-app-layout>
