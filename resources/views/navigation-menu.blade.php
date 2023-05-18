<header x-data="{ open: false }" @keydown.window.escape="open = false" class="bg-black">
    <nav class="mx-auto flex max-w-6xl items-center justify-between px-6 py-4 lg:px-8" aria-label="Global">
        <div class="flex lg:flex-1">
            <x-application-mark />
        </div>
        <div class="flex md:hidden">
            <button type="button" class="-m-2.5 inline-flex items-center justify-center rounded-md p-2.5 text-white"
                @click="open = true">
                <span class="sr-only">Open main menu</span>
                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                    aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5"></path>
                </svg>
            </button>
        </div>
        <div class="hidden md:flex md:gap-x-6 lg:gap-x-12">

            <a href="{{ route('home') }}"
                class="font-semibold leading-6 text-white border-b-4 border-transparent hover:border-rose-600 hover:transition hover:duration-500 hover:ease-in-out">Inicio</a>
            <a href="{{ route('comics.index') }}"
                class="font-semibold leading-6 text-white border-b-4 border-transparent hover:border-rose-600 hover:transition hover:duration-500 hover:ease-in-out">Comics</a>
            <a href="{{ route('search.users') }}"
                class="font-semibold leading-6 text-white border-b-4 border-transparent hover:border-rose-600 hover:transition hover:duration-500 hover:ease-in-out">Creadores</a>
            <a href="{{ route('plan') }}"
                class="font-semibold leading-6 text-white border-b-4 border-transparent hover:border-rose-600 hover:transition hover:duration-500 hover:ease-in-out">Planes</a>
            <a href=""
                class="font-semibold leading-6 text-white border-b-4 border-transparent hover:border-rose-600 hover:transition hover:duration-500 hover:ease-in-out">FAQ</a>
        </div>
        <div class="hidden md:flex lg:flex-1 lg:justify-end lg:items-center space-x-2">
            @auth
                <div class="flex items-center justify-center space-x-3">
                    <div>
                        @if (auth()->user()->is_creator == false)
                            <a href="{{ route('register-creator') }}"
                                class="text-white uppercase text-sm bg-green-700 font-bold py-3 px-4 rounded-full">
                                PUBLICAR</a>
                        @endif
                    </div>
                    {{--  <div class="flex items-center">
                        <a href="{{ route('comics.user') }}"
                            class="font-josefin font-bold p-1 text-yellow-500 rounded-full hover:bg-white hover:text-black">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                                <path fill-rule="evenodd"
                                    d="M9 4.5a.75.75 0 01.721.544l.813 2.846a3.75 3.75 0 002.576 2.576l2.846.813a.75.75 0 010 1.442l-2.846.813a3.75 3.75 0 00-2.576 2.576l-.813 2.846a.75.75 0 01-1.442 0l-.813-2.846a3.75 3.75 0 00-2.576-2.576l-2.846-.813a.75.75 0 010-1.442l2.846-.813A3.75 3.75 0 007.466 7.89l.813-2.846A.75.75 0 019 4.5zM18 1.5a.75.75 0 01.728.568l.258 1.036c.236.94.97 1.674 1.91 1.91l1.036.258a.75.75 0 010 1.456l-1.036.258c-.94.236-1.674.97-1.91 1.91l-.258 1.036a.75.75 0 01-1.456 0l-.258-1.036a2.625 2.625 0 00-1.91-1.91l-1.036-.258a.75.75 0 010-1.456l1.036-.258a2.625 2.625 0 001.91-1.91l.258-1.036A.75.75 0 0118 1.5zM16.5 15a.75.75 0 01.712.513l.394 1.183c.15.447.5.799.948.948l1.183.395a.75.75 0 010 1.422l-1.183.395c-.447.15-.799.5-.948.948l-.395 1.183a.75.75 0 01-1.422 0l-.395-1.183a1.5 1.5 0 00-.948-.948l-1.183-.395a.75.75 0 010-1.422l1.183-.395c.447-.15.799-.5.948-.948l.395-1.183A.75.75 0 0116.5 15z"
                                    clip-rule="evenodd" />
                            </svg>
                        </a>
                        @livewire('user.user-money', ['user' => auth()->user()])
                    </div> --}}
                    <div class="ml-3 relative">
                        <x-dropdown align="right" width="48">
                            <x-slot name="trigger">
                                @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                    <button
                                        class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                                        <img class="h-8 w-8 rounded-full object-cover"
                                            src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                                    </button>
                                @endif
                            </x-slot>

                            <x-slot name="content">
                                <!-- Account Management -->
                                <div class="block px-4 py-2 text-xs text-gray-400">
                                    {{ __('Manage Account') }}
                                </div>
                                @can('Listar Comic (creador)')
                                    <x-dropdown-link href="{{ route('creator.comics.index') }}">
                                        Panel de creador
                                    </x-dropdown-link>
                                @endcan
                                @can('Ver Dashboard (administrador)')
                                    <x-dropdown-link href="{{ route('admin.home') }}">
                                        Panel de administrador
                                    </x-dropdown-link>
                                @endcan

                                <x-dropdown-link href="{{ route('profile.show') }}">
                                    Configuraciónes
                                </x-dropdown-link>
                                <div class="border-t border-gray-100"></div>

                                <!-- Authentication -->
                                <form method="POST" action="{{ route('logout') }}" x-data>
                                    @csrf

                                    <x-dropdown-link href="{{ route('logout') }}" @click.prevent="$root.submit();">
                                        {{ __('Log Out') }}
                                    </x-dropdown-link>
                                </form>
                            </x-slot>
                        </x-dropdown>
                    </div>
                </div>
            @else
                @livewire('modals')
            @endauth
        </div>
    </nav>
    <!-- Menu mobile -->
    <div class="lg:hidden" x-show="open" aria-modal="true" >
        <div x-description="Background backdrop, show/hide based on slide-over state." class="fixed inset-0 z-10">
        </div>
        <div class="fixed inset-y-0 right-0 z-10 w-full overflow-y-auto bg-black px-6 py-6 sm:max-w-sm sm:ring-1 sm:ring-gray-900/10"
            @click.away="open = false">
            <div class="flex items-center justify-between">
                <x-application-mark />
                <button type="button" class="-m-2.5 rounded-md p-2.5 text-white" @click="open = false">
                    <span class="sr-only">Close menu</span>
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                        aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
            <div class="mt-6 flow-root">
                <div class="-my-6 divide-y divide-white">
                    <div class="space-y-2 py-6">

                        <a href="{{ route('home') }}"
                            class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-white hover:bg-gray-800">Inicio</a>
                        <a href="{{ route('comics.index') }}"
                            class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-white hover:bg-gray-800">Comics</a>
                        <a href="{{ route('search.users') }}"
                            class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-white hover:bg-gray-800">Creadores</a>
                        <a href="{{ route('plan') }}"
                            class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-white hover:bg-gray-800">Planes</a>
                        <a href="#"
                            class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-white hover:bg-gray-800">Creadores</a>
                    </div>
                    <div class="py-6">
                        @auth
                            <form method="POST" action="{{ route('logout') }}" x-data>
                                @csrf

                                <x-dropdown-link class="text-white font-bold" href="{{ route('logout') }}" @click.prevent="$root.submit();">
                                    Cerrar Sesión
                                </x-dropdown-link>
                            </form>
                        @else
                            @livewire('modals')
                        @endauth

                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
