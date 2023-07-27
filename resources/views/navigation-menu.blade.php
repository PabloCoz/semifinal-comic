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
                class="font-semibold uppercase leading-6 text-white border-b-4 
                @routeIs('home') 
                    border-rose-600
                @else
                    border-transparent hover:border-rose-600 
                @endif 
                    hover:transition hover:duration-500 hover:ease-in-out">Inicio</a>
            <a href="{{ route('comics.index') }}"
                class="font-semibold uppercase leading-6 text-white border-b-4 
                @routeIs('comics.index') 
                    border-rose-600
                @else
                    border-transparent hover:border-rose-600 
                @endif 
                    hover:transition hover:duration-500 hover:ease-in-out">Comics</a>
            <a href="{{ route('search.users') }}"
                class="font-semibold uppercase leading-6 text-white border-b-4 
                @routeIs('search.users') 
                    border-rose-600
                @else
                    border-transparent hover:border-rose-600 
                @endif 
                    hover:transition hover:duration-500 hover:ease-in-out">Creadores</a>
            {{-- <a href="{{ route('plan') }}"
                class="font-semibold uppercase leading-6 text-white border-b-4 border-transparent hover:border-rose-600 hover:transition hover:duration-500 hover:ease-in-out">Planes</a> --}}
            <a href="{{ route('info') }}"
                class="font-semibold uppercase leading-6 text-white border-b-4 
                @routeIs('info') 
                    border-rose-600
                @else
                    border-transparent hover:border-rose-600 
                @endif 
                    hover:transition hover:duration-500 hover:ease-in-out">Nosotros</a>
            <a href="{{ route('faq.index') }}"
                class="font-semibold uppercase leading-6 text-white border-b-4 
                @routeIs('faq.index') 
                    border-rose-600
                @else
                    border-transparent hover:border-rose-600 
                @endif 
                    hover:transition hover:duration-500 hover:ease-in-out">FAQ</a>
        </div>
        <div class="hidden md:flex lg:flex-1 lg:justify-end lg:items-center space-x-2">
            @auth
                <div class="flex items-center justify-center space-x-3">
                    <div>
                        @if (auth()->user()->is_creator == false)
                            <a href="{{ route('register-creator') }}"
                                class="text-black uppercase text-sm bg-white font-bold py-3 px-4 rounded-full">
                                PUBLICAR YA!</a>
                        @endif
                    </div>
                    <div class="flex items-center">
                        <a href="{{ route('comics.user') }}"
                            class="font-josefin font-bold p-1 text-yellow-500 rounded-full hover:bg-white hover:text-black">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M16.5 3.75V16.5L12 14.25 7.5 16.5V3.75m9 0H18A2.25 2.25 0 0120.25 6v12A2.25 2.25 0 0118 20.25H6A2.25 2.25 0 013.75 18V6A2.25 2.25 0 016 3.75h1.5m9 0h-9" />
                            </svg>

                        </a>
                        {{-- @livewire('user.user-money', ['user' => auth()->user()]) --}}
                    </div>
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
    <div class="lg:hidden" x-show="open" aria-modal="true">
        <div x-description="Background backdrop, show/hide based on slide-over state." class="fixed inset-0 z-50">
        </div>
        <div class="fixed inset-y-0 right-0 z-50 w-full overflow-y-auto bg-black px-6 py-6 sm:max-w-sm sm:ring-1 sm:ring-gray-900/10"
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
                            class="-mx-3 block uppercase rounded-lg px-3 py-2 text-base font-semibold leading-7 text-white hover:bg-gray-800">Inicio</a>
                        <a href="{{ route('comics.index') }}"
                            class="-mx-3 block uppercase rounded-lg px-3 py-2 text-base font-semibold leading-7 text-white hover:bg-gray-800">Comics</a>
                        <a href="{{ route('search.users') }}"
                            class="-mx-3 block uppercase rounded-lg px-3 py-2 text-base font-semibold leading-7 text-white hover:bg-gray-800">Creadores</a>
                        {{-- <a href="{{ route('plan') }}"
                            class="-mx-3 block uppercase rounded-lg px-3 py-2 text-base font-semibold leading-7 text-white hover:bg-gray-800">Planes</a> --}}
                        <a href="{{ route('faq.index') }}"
                            class="-mx-3 block uppercase rounded-lg px-3 py-2 text-base font-semibold leading-7 text-white hover:bg-gray-800">Creadores</a>
                    </div>
                    <div class="py-6">
                        @auth
                            <div>
                                <a href="{{ route('profile.show') }}"
                                    class="text-white font-bold flex items-center justify-start">
                                    <img src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}"
                                        class="h-8 w-8 rounded-full object-cover">
                                    <h1 class="ml-2">{{ Auth::user()->username }}</h1>
                                </a>
                            </div>
                            <form method="POST" action="{{ route('logout') }}" x-data>
                                @csrf

                                <x-dropdown-link
                                    class="-mx-3 block w-full bg-white mt-4 rounded-lg px-3 py-2 text-base font-semibold leading-7 hover:bg-gray-300"
                                    href="{{ route('logout') }}" @click.prevent="$root.submit();">
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
