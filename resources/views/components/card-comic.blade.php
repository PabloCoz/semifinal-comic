@props(['comic'])
<div class="mx-1 md:mx-0">
    <a href="{{route('comics.show', $comic)}}">
        <div class="flex justify-center items-center relative">
            <figure class="md:rounded-md shadow-md overflow-hidden">
                <img class="h-72 object-center object-cover w-full" src="{{ Storage::url($comic->image->url) }}"
                    alt="" loading="lazy">
            </figure>
            <div class="absolute top-1 left-2 bg-yellow-500 px-1 py-0.5 rounded-lg">
                <h1 class="font-josefin font-bold">{{ $comic->category->name }}
                </h1>

            </div>
            <div class="absolute top-1 right-2 bg-rose-600 text-white px-1 py-0.5 rounded-lg">
                <div class="font-josefin font-bold flex items-center">
                    <button>
                        <i class="fa-solid fa-eye"></i>
                    </button>
                    <p class="ml-0.5">{{ $comic->users->count() }}</p>
                </div>
            </div>
        </div>

        <div>
            <h1 class="font-josefin text-white text-center text-xl font-bold">
                {{ Str::limit($comic->title, 36, '...') }}</h1>

        </div>
    </a>
</div>
