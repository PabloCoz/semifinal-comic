<x-app-layout>
    <header class="w-full relative h-96">
        <img class="w-full h-full object-cover z-10 brightness-50" src="{{ Storage::url($user->profile->front_page) }}">
    </header>
    <section class="bg-black">
        <div class="max-w-5xl mx-auto pb-2">
            <div class="grid grid-cols-1 md:grid-cols-5 lg:grid-cols-7 gap-5">
                <div class="col-span-1 md:col-span-2 -mt-12 relative z-10">
                    <div class="flex justify-center">
                        <img class="h-52 w-52 rounded-full object-cover object-center"
                            src="{{ $user->profile_photo_url }}" alt="" loading="lazy">
                    </div>
                    <div class="my-5">
                        <h1 class="text-white text-center font-bold text-xl">
                            {{ $user->profile->name . ' ' . $user->profile->lastname }}</h1>
                    </div>
                    <div class="flex justify-center mt-5">
                        <div class="w-full">
                            @auth
                                @if ($user->id != auth()->user()->id)
                                    @can('premiun', $user)
                                        <form action="{{ route('users.desubscription', $user) }}" method="POST">
                                            @csrf
                                            <button type="submit"
                                                class="p-3 bg-red-400 text-white rounded-full font-bold w-full">
                                                Dejar de seguir
                                            </button>
                                        </form>
                                    @else
                                        <form action="{{ route('users.premium', $user) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="p-3 bg-sky-400 rounded-full font-bold w-full">
                                                Seguir
                                            </button>
                                        </form>
                                    @endcan
                                @endif
                                @if ($user->profile->is_original == 3 && $user->id == auth()->user()->id)
                                    <form action="{{ route('users.original', $user) }}" method="POST">
                                        @csrf
                                        <button type="submit"
                                            class="p-3 bg-red-400 rounded-full font-bold w-full text-white">
                                            Solicitar ser usuario original
                                        </button>
                                    </form>
                                @endif

                                @if (auth()->user()->id == $user->id)
                                    <a href="{{ route('register-creator') }}">
                                        <button class="p-3 bg-gray-700 text-white rounded-full font-bold w-full mt-4">
                                            Perzonalizar perfil
                                        </button>
                                    </a>
                                @endif
                            @endauth
                        </div>
                    </div>
                    <article class="mt-8">
                        <h1 class="text-white font-bold font-josefin text-xl uppercase text-center md:text-left">
                            Redes sociales
                        </h1>
                        <div class="mt-5 space-x-3 flex justify-center items-center">
                            <a href="{{ $user->profile->facebook }}"
                                class="bg-blue-600 px-3 py-2 text-white font-bold font-josefin text-xl rounded-full">Facebook</a>
                            <a href="{{ $user->profile->instagram }}"
                                class="bg-gradient-to-r from-pink-600 via-red-500 to-yellow-500 px-3 py-2 text-white font-bold font-josefin text-xl rounded-full">Instagram</a>
                        </div>
                    </article>
                    <article class="mt-8">
                        <h1 class="text-white font-bold font-josefin text-xl uppercase text-center md:text-left">
                            Comics Destacados
                        </h1>
                        <div>
                            @if ($user->comics_created->count() > 0)
                                <ul class="mt-5">
                                    @if ($user->profile->is_original == true)
                                        @if ($user->comics_created->first()->status == 3)
                                            <div>
                                                <div class="flex justify-center items-center">
                                                    <img src="{{ Storage::url($user->comics_created->first()->img) }}"
                                                        class="w-full h-64 object-cover object-center rounded-lg"
                                                        loading="lazy">
                                                </div>
                                                <div class="mt-2">
                                                    <h1
                                                        class="text-white font-bold font-josefin text-lg text-center uppercase">
                                                        {{ $user->comics_created->first()->title }}
                                                    </h1>
                                                </div>

                                            </div>
                                        @endif
                                    @else
                                        @if ($user->comics_created->first()->status == 3)
                                            <div>
                                                <div class="flex justify-center items-center">
                                                    <img src="{{ Storage::url($user->comics_created->first()->img) }}"
                                                        class="w-44 h-64 object-cover object-center rounded-lg"
                                                        loading="lazy">
                                                </div>
                                                <div class="mt-2">
                                                    <h1
                                                        class="text-white font-bold font-josefin text-lg text-center uppercase">
                                                        {{ $user->comics_created->first()->title }}
                                                    </h1>
                                                </div>
                                            </div>
                                        @endif
                                    @endif

                                </ul>
                            @else
                                <div class="flex justify-center items-center py-10">
                                    <a href="{{ route('creator.comics.index') }}">
                                        <button class="p-3 bg-gray-700 text-white rounded-full font-bold w-full mt-4">
                                            Crear tu primer comic
                                        </button>
                                    </a>
                                </div>
                            @endif
                        </div>
                    </article>
                </div>

                <div class="col-span-1 md:col-span-3 lg:col-span-5">
                    <div class="p-2 mt-5">
                        <h1 class="text-center font-bold text-white font-josefin uppercase text-xl md:text-left">Bio
                        </h1>
                        <p class="text-white text-justify">
                            {{ $user->profile->bio }}
                        </p>
                    </div>
                    <hr class="my-3">
                    <div class="mt-3">
                        @if ($user->profile->is_original == 1 && $user->id == auth()->user()->id)
                            <section>
                                @livewire('post.post-create')
                            </section>
                        @endif
                        <h1 class="text-white font-bold font-josefin my-4 text-center text-3xl">Publicaciones</h1>
                        <div class="mb-4">
                            @livewire('post.post-list', ['user' => $user])
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
