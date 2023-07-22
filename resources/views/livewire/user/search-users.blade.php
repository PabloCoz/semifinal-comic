<div class="bg-black">
    <x-slider-component :sliders="$sliders" />
    <header class="w-full h-auto overflow-hidden bg-rose-600">

        <div class="max-w-5xl mx-auto select-none">
            <div class="py-40 ">
                <h1 class="uppercase mb-6 text-5xl lg:text-6xl font-bold text-white text-center">¿Ya te sabes
                    el nombre de tu creador de comics preferido?</h1>
                <div class="flex justify-center mx-2 md:mx-0">

                    <form class="pt-2 relative text-gray-600 w-full" autocomplete="off">
                        <input wire:model="search"
                            class="w-full bg-white h-10 px-3 pr-16 rounded-lg text-sm border focus:border-black ring-0 focus:ring-black focus:outline-none"
                            type="search" name="search" placeholder="Ingrese nombre de usuario">
                        <button type="submit"
                            class="bg-black text-white font-bold py-2 px-4 rounded-r absolute right-0 top-0 mt-2 focus:outline-none">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                            </svg>
                        </button>
                        @if ($search)
                            <ul class="absolute z-50 left-0 w-full bg-white mt-1 rounded overflow-hidden">
                                @forelse ($this->results as $result)
                                    <a href="{{ route('users.show', $result->user) }}">
                                        <li class="leading-10 px-5 text-xs cursor-pointer hover:bg-gray-300">
                                            {{ $result->name . ' ' . $result->lastname }}
                                            ({{ $result->user->username }})
                                        </li>
                                    </a>
                                @empty
                                    <li class="leading-10 px-5 text-xs cursor-pointer hover:bg-gray-300">
                                        No hay resultados
                                    </li>
                                @endforelse
                            </ul>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </header>
    <section class="p-2">
        <div class="max-w-4xl mx-auto px-4">
            <div class="block md:flex justify-between items-center">
                <div class="p-3 md:w-96">
                    <h1 class="uppercase font-bold font-josefin text-2xl text-red-300">MÁS CERCA DE TUS AUTORES
                        FAVORITOS</h1>
                    <p class="mt-10 text-white">
                        Hecha un vistaso a los perfiles, podrás descubrir sus aficiones, géneros de comic en los cuales
                        ellos se especializan y si tu creador tienen imagenes exclusivas de tu comic favorito.
                    </p>
                </div>
                <div class="p-3 md:w-96">
                    <div class="flex justify-end">
                        <img class="h-44 md:h-64" src="{{ asset('img/images/AGA.png') }}" alt="">
                    </div>
                    <div class="flex justify-start">
                        <img class="h-44 md:h-64 -mt-20 md:-mt-28" src="{{ asset('img/images/blancoo.png') }}"
                            alt="">
                    </div>

                </div>
            </div>
        </div>
    </section>
    <section class="max-w-4xl mx-auto">
        <div class="my-10 border-t-4 border-dashed border-gray-500 p-2">
            <div class="mt-7">
                <h1 class="font-bold font-josefin text-3xl text-sky-400 text-center">CREADORES</h1>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 divide-y-2 md:divide-y-0 divide-gray-200 mt-4">
                @foreach ($this->users as $profile)
                    <a href="{{ route('users.show', $profile->user) }}"
                        class="hover:bg-white rounded-md text-white hover:text-black p-2  transition duration-500 ease-in-out">
                        <div class="py-2">
                            <div class="flex justify-center items-center">
                                <img class="h-52 w-52 rounded-full object-cover object-center"
                                    src="{{ $profile->user->profile_photo_url }}" alt="" loading="lazy">
                            </div>
                            <div class=" mt-5">
                                <h1 class="text-center font-bold text-2xl uppercase font-josefin">
                                    {{ $profile->user->username }}</h1>
                                <p class="text-justify">{{ Str::limit($profile->bio, 100, '...') }}</p>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </section>
    <section>
        <x-footer />
    </section>
</div>
