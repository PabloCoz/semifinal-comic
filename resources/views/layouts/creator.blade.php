<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,300;0,400;0,500;0,700;1,200;1,300;1,400;1,500;1,600&display=swap"
        rel="stylesheet">
    <script src="https://kit.fontawesome.com/2537d8fed3.js" crossorigin="anonymous"></script>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Styles -->
    @livewireStyles
</head>

<body class="font-sans antialiased">


    <div class="min-h-screen bg-gray-100">
        @livewire('navigation-menu')
        <!-- Page Heading -->
        <div class="max-w-6xl mx-auto grid grid-cols-1 md:grid-cols-5 gap-6 py-4">
            <aside class="mx-3 md:mx-0">
                <a href="{{ route('creator.comics.index') }}"
                    class="my-8 bg-indigo-500 text-white font-bold p-2 rounded-full uppercase text-sm tracking-wider">menu
                    principal</a>
                <h1 class="font-bold text-lg my-4">EDITOR</h1>

                <ul class="text-sm space-y-3">
                    <li class="leading-7 mb-1 border-l-4 pl-2 @routeIs('creator.comics.edit', $comic) border-rose-600 @endif">
                        <a href="{{ route('creator.comics.edit', $comic) }}">Información General</a>
                    </li>
                    <li class="leading-7 mb-1 border-l-4 pl-2 @routeIs('creator.comics.chapter', $comic) border-rose-600 @endif">
                        <a href="{{ route('creator.comics.chapter', $comic) }}">Capítulos</a>
                    </li>
                    <li class="leading-7 mb-1 border-l-4 pl-2">
                        <a href="">Detalles extras</a>
                    </li>
                    <li class="leading-7 mb-1 border-l-4 pl-2 @routeIs('creator.comics.observations', $comic) border-rose-600 @endif">
                        <div class="flex items-center">
                            
                        </div>
                    </li>
                </ul>

                <div class="mt-4">
                    @switch($comic->status)
                        @case(1)
                            <form action="{{ route('creator.comics.status', $comic) }}" method="POST">
                                @csrf
                                <button type="submit"
                                    class="bg-red-500 text-white font-bold p-2 rounded-full uppercase text-sm tracking-wider">
                                    Solicitar revision
                                </button>
                            </form>
                        @break

                        @case(2)
                            <span class="bg-yellow-500 text-white font-bold p-2 rounded-full uppercase text-sm tracking-wider">
                                En revisión
                            </span>
                        @break

                        @case(3)
                            <span class="bg-green-500 text-white font-bold p-2 rounded-full uppercase text-sm tracking-wider">
                                Publicado
                            </span>
                        @break

                        @default
                    @endswitch
                </div>
            </aside>
            <div class="md:col-span-4 overflow-hidden bg-white rounded-lg shadow-md">
                <main class="px-4 py-6">
                    {{ $slot }}
                </main>
            </div>
        </div>

    </div>

    @stack('modals')

    @livewireScripts
    @stack('sortable')
    @stack('js')

</body>

</html>
