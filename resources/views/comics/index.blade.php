<x-app-layout>
    <section class="@if(count($sliders)) py-10 @else py-60 @endif bg-fixed bg-center bg-no-repeat bg-cover relative"
        style="background-image: url({{ asset('img/images/portada2.png') }})">
        <div class="max-w-7xl mx-auto relative z-40">
            <x-slider-component :sliders="$sliders" />
        </div>
    </section>

    @livewire('comics.comic-index')

    <x-footer />
</x-app-layout>
