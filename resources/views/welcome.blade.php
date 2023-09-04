<x-app-layout>
    {{-- <x-slider-component :sliders="$sliders" /> --}}

    <header class="w-full relative h-auto overflow-hidden">

        <div class="max-w-5xl mx-auto md:mx-10 lg:mx-20 relative z-20 select-none">
            <div class="py-64">
                <h1 class="uppercase font-josefin font-bold text-white text-5xl md:text-4xl lg:text-6xl mr-8">
                    <p>Forma parte</p>
                    de nosotros
                </h1>
                <div class="block md:flex items-center md:space-x-3 space-y-2 md:space-y-0">
                    <a href="{{ route('comics.index') }}"
                        class="block font-josefin font-extrabold px-6 py-3 text-center rounded-full uppercase text-white bg-rosecomic">
                        como lector</a>
                    <a href="{{ route('info') }}"
                        class=" block font-josefin font-bold px-4 py-2 text-center rounded-full uppercase bg-white border-2 border-white">
                        como creador</a>
                </div>
            </div>
        </div>
        <div>
            <video class="absolute top-0 left-0 w-full h-5/6 md:h-full object-center object-cover md:object-center z-10"
                autoplay loop muted>
                <source src="{{ asset('img/prueba.mp4') }}" type="video/mp4">
            </video>
        </div>
    </header>

    <section class="bg-black pt-10">
        <div class="max-w-xl mx-auto">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-2 pb-10">
                <div>
                    <img src="{{ asset('img/vector.png') }}" class="h-56 w-full object-contain">
                </div>
                <div class="flex justify-center items-center">
                    <div>
                        <h1 class="font-josefin font-extrabold text-2xl text-center text-rosecomic">¿ERES PRINCIPIANTE
                            EN
                            LOS COMICS?</h1>
                        <div class="flex justify-center">
                            <button class="mt-4 bg-white rounded-full px-3 py-2 font-bold font-josefin uppercase">
                                Saber más..
                            </button>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <section class="py-10 bg-fixed bg-center bg-no-repeat bg-cover relative"
            style="background-image: url({{ asset('img/images/portada.png') }})">
            <div class="max-w-3xl mx-auto relative z-40">
                <hr class="border-2 border-dashed border-white mb-4">
                <h1 class="font-josefin font-bold text-3xl text-white text-center">Empieza con 4 simples pasos</h1>
                <div
                    class="grid grid-cols-1 md:grid-cols-2 gap-6 md:gap-3 mt-6 divide-y-4 space-y-4 md:space-y-0 md:divide-y-0 divide-white">
                    <div class>
                        <div class="flex items-center justify-center">
                            <div>
                                <img src="{{ asset('img/vector/1.svg') }}" class="h-60 w-full object-contain"
                                    loading="lazy">
                                <div class="mt-3">
                                    <h1
                                        class="bg-white p-2 mx-16 text-center text-2xl font-bold font-josefin rounded-full">
                                        Paso 1</h1>
                                    <p class="text-xl text-white text-center font-bold mt-5">Crea un cuenta o inicia
                                        sesión
                                    </p>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="">
                        <div class="flex items-center justify-center">
                            <div>
                                <img src="{{ asset('img/vector/2.svg') }}" class="h-60 w-full object-contain"
                                    loading="lazy">
                                <div class="mt-3">
                                    <h1
                                        class="bg-white text-center text-2xl mx-9 p-2 font-bold font-josefin rounded-full">
                                        Paso 2</h1>
                                    <p class="text-xl text-white text-center font-bold mt-5">Activa el modo creador</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="flex items-center justify-center">
                            <div>
                                <img src="{{ asset('img/vector/3.svg') }}" class="h-60 w-full object-contain"
                                    loading="lazy">
                                <div class="mt-3">
                                    <h1
                                        class="bg-white p-2 mx-16 text-center text-2xl font-bold font-josefin rounded-full">
                                        Paso 3</h1>
                                    <p class="text-xl text-white text-center font-bold mt-5">Crea tu comic y subo tus
                                        imagenes</p>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div>
                        <div class="flex items-center justify-center">
                            <div>
                                <img src="{{ asset('img/vector/4.svg') }}" class="h-60 w-full object-contain"
                                    loading="lazy">
                                <div class="mt-3">
                                    <h1 class="bg-white text-center text-2xl p-2 font-bold font-josefin rounded-full">
                                        Paso 4
                                    </h1>
                                    <p class="text-xl text-white text-center font-bold mt-5">Publica tu comic con otros
                                    </p>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
            <div class="absolute bg-gradient-to-r from-skcomic to-rosecomic opacity-90 z-30 top-0 left-0 w-full h-full">
            </div>
        </section>

        <div class="max-w-3xl mx-auto my-10">
            <hr class="border-2 border-dashed border-skcomic my-4">
            <div class="max-w-5xl mx-auto">
                <h1 class="font-josefin text-center text-lg text-white">
                    NUESTROS COMICS YA PUBLICADOS
                </h1>
                <p class="text-skcomic text-center font-josefin font-bold uppercase text-xl truncate mt-4">MILES DE
                    CREADORES YA
                    SE ESTAN SUMANDO ¿QUE ESPERAS?</p>
            </div>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mt-10">
                @foreach ($comics as $comic)
                    <x-card-comic :comic="$comic" />
                @endforeach
            </div>
            <div class="flex items-center justify-center">
                <a href="{{ route('comics.index') }}"
                    class="w-52 bg-skcomic hover:bg-sky-500 py-2 text-center text-white font-josefin font-bold text-xl rounded-full uppercase mt-4">Ver
                    más
                </a>
            </div>
        </div>

        <div>
            <x-footer />
        </div>
    </section>
</x-app-layout>
