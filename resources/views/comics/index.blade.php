<x-app-layout>
    <x-slider-component :sliders="$sliders" />

    @livewire('comics.comic-index')

    <x-footer />
</x-app-layout>
