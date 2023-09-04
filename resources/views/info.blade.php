<x-app-layout>
    <header class="w-full relative h-auto overflow-hidden">
        <section class="py-10 bg-fixed bg-center bg-no-repeat bg-cover relative"
            style="background-image: url({{ asset('img/final1.png') }})">
            <div class="max-w-5xl mx-auto relative z-40 select-none">
                <div class="py-44">
                    <h1 class="font-josefin font-bold text-6xl text-white text-center">NOSOTROS</h1>
                </div>
            </div>
            <div class="absolute bg-gradient-to-r from-skcomic to-rosecomic opacity-90 z-30 top-0 left-0 w-full h-full">
            </div>
        </section>
    </header>
    <section class="bg-black py-10">
        <div class="max-w-3xl mx-auto">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                <div>
                    <h1 class="font-josefin text-2xl font-bold text-center text-white">
                        ¿POR QUÉ BAPSCOMIC ES LA MEJOR OPCIÓN PARA TI?
                    </h1>
                    <div class="flex items-center justify-center">
                        <img src="{{ asset('img/images/baps-chiqui.png') }}" class="h-44 w-40 object-contain">
                    </div>
                </div>
                <div>
                    <p class="text-white text-justify">Nuestra empresa reconoce el talento poco valorado en esta parte
                        del mundo,
                        nos interesa apoyar y motivar a seguir creando, publicando excelente contenido.
                        Asi que <b class="font-josefin">BAPSCOMIC</b> ha puesto en marcha beneficios exclusivos para
                        todos los autores
                        y autoras comprometiendose a brindar mas y mejores servicios para tú crecimiento día a día.
                    </p>
                </div>
            </div>
            <div class="mt-10">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-3">
                    <div>
                        <h1 class="font-josefin text-rose-500 font-bold text-center text-lg">INGRESOS MENSUALES</h1>
                        <div class="flex items-center justify-center">
                            <img src="{{ asset('img/images/monedas.png') }}"
                                class="w-44 h-44 object-contain object-center">
                        </div>
                    </div>

                    <div>
                        <h1 class="font-josefin text-white font-bold text-center text-lg">FAMA MUNDIAL</h1>
                        <div class="flex items-center justify-center">
                            <img src="{{ asset('img/images/fam.png') }}" class="w-44 h-44 object-contain object-center">
                        </div>
                    </div>

                    <div>
                        <h1 class="font-josefin text-rose-500 font-bold text-center text-lg">GRANDES PREMIOS</h1>
                        <div class="flex items-center justify-center">
                            <img src="{{ asset('img/images/ganar.png') }}"
                                class="w-44 h-44 object-contain object-center">
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-10 flex items-center justify-center">
                @auth
                    <a href="{{ route('register-creator') }}">
                        <button
                            class="px-6 py-3 bg-gradient-to-r from-skcomic to-rosecomic rounded-full uppercase text-lg italic font-extrabold tracking-wider">
                            REGISTRARSE
                        </button>
                    </a>
                @else
                    @livewire('modals')
                @endauth

            </div>
        </div>
    </section>
    <x-footer />

</x-app-layout>
