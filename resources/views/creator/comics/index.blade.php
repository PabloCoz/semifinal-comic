<x-app-layout>
    <div class="my-4 mx-auto max-w-3xl">
        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                <span class="block text-sm font-bold font-josefin sm:inline">{{ session('success') }}</span>
            </div>           
        @endif
    </div>
    @livewire('creator.comics-index')
</x-app-layout>