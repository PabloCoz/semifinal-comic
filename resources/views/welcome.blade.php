<x-app-layout>
    <x-slider-component :sliders="$sliders" />

    <section class="bg-black pt-10">
        <div class="max-w-xl mx-auto">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-2">
                <div>
                    <img src="{{ asset('img/vector.png') }}" class="h-56 w-full object-contain">
                </div>
                <div class="flex justify-center items-center">
                    <div>
                        <h1 class="font-josefin font-extrabold text-2xl text-center text-rosecomic">¿ERES PRINCIPIANTE EN
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


        <div class="max-w-3xl mx-auto my-10">
            <hr class="border-2 border-dashed border-skcomic my-4">
            <div class="max-w-5xl mx-auto">
                <h1 class="font-josefin text-center text-xl text-white">
                    NUESTROS COMICS YA PUBLICADOS
                </h1>
                <p class="text-skcomic text-center font-josefin font-bold uppercase text-4xl mt-4">MILES DE CREADORES YA
                    SE ESTAN SUMANDO ¿QUE ESPERAS?</p>
            </div>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mt-10">
                @foreach ($comics as $comic)
                    <x-card-comic :comic="$comic" />
                @endforeach
            </div>
            <div>
                <a href="{{ route('comics.index') }}"
                    class="block w-full bg-rose-600 py-2 text-center text-white font-josefin font-bold text-xl rounded-lg mt-4">Ver más comics...
                </a>
            </div>
        </div>

        <div>
            <x-footer />
        </div>
    </section>
</x-app-layout>
