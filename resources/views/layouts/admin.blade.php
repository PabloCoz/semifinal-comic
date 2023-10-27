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
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Styles -->
    @livewireStyles

    <link rel="stylesheet" href="https://flowbite.com/docs/flowbite.css?v=1.6.4a">
</head>



<body style="height: 600px" class="p-5 bg-white dark:bg-gray-900 antialiased">

    <x-siderbar />

    <div class="p-2 sm:ml-64">
        <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
            <main>
                {{ $slot }}
            </main>
        </div>
    </div>

    <script src="https://flowbite.com/docs/flowbite.min.js"></script>
    <script src="https://flowbite.com/docs/datepicker.min.js"></script>
    <script>
        window.onload = function() {
            const dropdownEl = document.querySelector('[data-dropdown-toggle]');
            if (dropdownEl) {
                dropdownEl.click();
            }
            const modalEl = document.querySelector('[data-modal-toggle]');
            if (modalEl) {
                modalEl.click();
            }
            const dateRangePickerEl = document.querySelector('[data-rangepicker] input');
            if (dateRangePickerEl) {
                dateRangePickerEl.focus();
            }
            const drawerEl = document.querySelector('[data-drawer-show]');
            if (drawerEl) {
                drawerEl.click();
            }
        }
    </script>
</body>

@stack('modals')

@livewireScripts

@stack('open')
@stack('sweet')
@stack('glider')

</body>

</html>
