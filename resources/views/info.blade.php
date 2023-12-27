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
            <section>
                <h1 class="truncate text-rosecomic text-2xl font-bold uppercase font-josefin text-center">¿como es
                    nuestro sistema de pago?</h1>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-3 mt-12">
                    <div>
                        <h1 class="text-rosecomic text-center text-xl uppercase font-bold font-josefin">1.
                            anuncios</h1>
                        <p class="text-white font-semibold text-center text-lg mt-6">
                            Tendrás que publicar 5 cápitulos y a partir del sexto podrás activar esta opción, las
                            personas
                            que quieran ver el siguiente cápitulo tendrán que ver si o si un anuncio de 10 segundos.
                            El 90% ganacias serán para el autor y el 10% para BAPSCOMIC.
                        </p>
                    </div>
                    <div>
                        <h1 class="text-rosecomic text-center text-xl uppercase font-bold font-josefin">2. que
                            el lector decida pontenciar su apoyo</h1>
                        <p class="text-white font-semibold text-center text-lg mt-6">A partir del decimo cápitulo se
                            habilitará la opción "POTENCIAR TU APOYO". Para este punto es probable
                            que tus lectores se hayan encariñado con tu historia por lo que podrán ayudarte elevando la
                            cantidad
                            de segundos del anuncio pasando de 10 seg a 30 seg. Esta opcion es libre de elegir para el
                            lectores
                            no será obligatoria así que invitalos creativamente en tu comic a pulsar el boton
                            "POTENCIAR TU APOYO". El 90% ganacias serán para el autor y el 20% para BAPSCOMIC.
                        </p>
                    </div>
                    <div>
                        <h1 class="text-rosecomic text-center text-xl uppercase font-bold font-josefin">3.
                            pagaran directamente por tu contenido</h1>
                        <p class="text-white font-semibold text-center text-lg mt-6">
                            Al llegar al cápitulo 30 se habilitará la opción "UNA MONEDA POR CÁPITULO". A partir de aqui
                            probablemente habrás conectado con tus lectores y querrán los cápitulos sin anuncios, es por
                            eso
                            que habilitamos esta opción para que los lectores ya no vean ningun anuncio y puedan leer
                            sin problemas.
                        </p>
                    </div>
                </div>
            </section>
            <div class="mt-10 flex items-center justify-center">
                @auth
                    <a href="{{ route('register-creator') }}">
                        <button
                            class="px-6 py-3 bg-gradient-to-r from-skcomic to-rosecomic hover:from-white hover:to-white hover:text-black
                              rounded-full uppercase text-lg italic font-extrabold tracking-wider ">
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
