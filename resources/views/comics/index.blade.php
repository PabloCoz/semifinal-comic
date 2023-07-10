<x-app-layout>
    <div>
        <figure>
            <img src="{{ asset('img/images/portada2.png') }}" class="w-full object-cover" loading="lazy">
        </figure>
    </div>
    <x-slider-component :sliders="$sliders" />

    @livewire('comics.comic-index')

    <x-footer />
</x-app-layout>
