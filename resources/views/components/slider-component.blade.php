@props(['sliders'])
<div>

    <!-- Slider main container -->
    <div class="swiper">
        <!-- Additional required wrapper -->
        <div class="swiper-wrapper">
            <!-- Slides -->
            @foreach ($sliders as $slider)
                <div class="swiper-slide">
                    <figure>
                        <img class="object-cover object-center h-[450px] w-full" src="{{ Storage::url($slider->url) }}" lazy="loading" alt="{{ $slider->name }}">
                    </figure>
                </div>
            @endforeach
        </div>
        <!-- If we need pagination -->
        <div class="swiper-pagination"></div>
    </div>

    @push('swiper')
        <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
        <script>
            const swiper = new Swiper('.swiper', {
                direction: 'horizontal',
                loop: true,
                autoplay: {
                    delay: 7000,
                    disableOnInteraction: false,
                },

                pagination: {
                    el: '.swiper-pagination',
                    clickable: true,
                },
            });
        </script>
    @endpush
</div>
