@props(['comics'])
<div>
    <div class="glider-contain">
        <div class="glider">
            @forelse ($comics as $item)
                <a href="{{ route('comics.show', $item) }}" class="p-2">
                    <div class="flex justify-center items-center relative">
                        <figure class="md:rounded-md shadow-md overflow-hidden w-full">
                            <img class="h-72 object-center object-cover w-full"
                                src="{{ Storage::url($item->image->url) }}" alt="" loading="lazy">
                        </figure>
                        <div class="absolute top-1 left-2 px-1 py-0.5 rounded-lg"
                            style="background: {{ $item->category->color }}">
                            <h1 class="font-josefin font-bold truncate">{{ $item->category->name }}
                            </h1>

                        </div>
                        <div class="absolute top-1 right-2 bg-rose-600 text-white px-1 py-0.5 rounded-lg">
                            <div class="font-josefin font-bold flex items-center">
                                <button>
                                    <i class="fa-solid fa-eye"></i>
                                </button>
                                <p class="ml-0.5">{{ $item->users->count() }}</p>
                            </div>
                        </div>
                    </div>

                    <div>
                        <h1 class="font-josefin text-skcomic text-center font-bold uppercase">
                            {{ $item->title }}</h1>
                        <p class="text-white font-semibold truncate text-sm">
                            {{ Str::limit($item->description, 80, '...') }}</p>
                    </div>
                </a>
            @empty
                <div>
                    <p class="text-white">
                        No hay resultados
                    </p>
                </div>
            @endforelse
        </div>
        <div role="tablist" class="dots"></div>
    </div>

    @push('glider')
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/glider-js@1/glider.min.css">
        <script src="https://cdn.jsdelivr.net/npm/glider-js@1/glider.min.js"></script>

        <script>
            new Glider(document.querySelector('.glider'), {
                // Mobile-first defaults
                slidesToShow: 1,
                slidesToScroll: 1,
                scrollLock: true,
                dots: '.dots',
                //Espacio entre slides


                arrows: {
                    prev: '.glider-prev',
                    next: '.glider-next'
                },
                responsive: [{
                    // screens greater than >= 775px
                    breakpoint: 775,


                    settings: {
                        // Set to `auto` and provide item width to adjust to viewport
                        slidesToShow: 'auto',
                        slidesToScroll: 'auto',
                        itemWidth: 150,
                        duration: 0.25
                        //Espacio entre slides


                    }
                }, {
                    // screens greater than >= 1024px
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1,
                        itemWidth: 150,
                        duration: 0.25
                    }
                }]
            });
        </script>
    @endpush
</div>
