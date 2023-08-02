<div>
    <span id="arriba" class="hidden px-5 py-2 bg-white rounded-lg fixed bottom-5 right-5 cursor-pointer">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
            class="w-6 h-6 text-black font-bold">
            <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 10.5L12 3m0 0l7.5 7.5M12 3v18" />
        </svg>
    </span>

    <div class="max-w-3xl mx-auto py-4">
        <h1 class="font-josefin text-2xl text-center mt-3 text-white font-bold uppercase">
            {{ $current->name }}
        </h1>

        <div class="mt-3 w-full pb-2 object-center">
            @foreach ($current->images as $images)
                <img class="object-center" src="{{ Storage::url($images->url) }}" loading="lazy">
            @endforeach
        </div>

        <div class="card mt-2 ">
            <div class="card-body flex items-center font-bold">
                @if ($this->previous)
                    <a wire:click="changeChapter({{ $this->previous->id }})"
                        class="text-white bg-transparent hover:bg-white hover:text-black border-2 border-white cursor-pointer p-2 rounded-md">Capítulo
                        Anterior</a>
                @endif

                @if ($this->next)
                    <a wire:click="changeChapter({{ $this->next->id }})"
                        class="ml-auto text-white bg-transparent hover:bg-white hover:text-black border-2 border-white cursor-pointer p-2 rounded-md">Siguiente
                        Capítulo</a>
                @endif
            </div>
        </div>
        <ul class="flex justify-center items-center space-x-3 mt-3">
            @foreach ($chapters as $chapter)
                <li class="flex">
                    @if ($chapter->completed)
                        @if ($current->id == $chapter->id)
                            <a class="w-10 h-10 border-2 border-skcomic rounded-full cursor-pointer flex justify-center items-center text-white"
                                wire:click="changeChapter({{ $chapter->id }})">{{ $chapter->position }}</a>
                        @else
                            <a class="w-10 h-10 bg-skcomic rounded-full cursor-pointer flex justify-center items-center text-white"
                                wire:click="changeChapter({{ $chapter->id }})">{{ $chapter->position }}</a>
                        @endif
                    @else
                        @if ($current->id == $chapter->id)
                            <a class="w-10 h-10 border-2 border-rosecomic rounded-full cursor-pointer flex justify-center items-center text-white"
                                wire:click="changeChapter({{ $chapter->id }})">{{ $chapter->position }}</a>
                        @else
                            <a class="w-10 h-10 bg-rosecomic rounded-full cursor-pointer flex justify-center items-center text-white"
                                wire:click="changeChapter({{ $chapter->id }})">{{ $chapter->position }}</a>
                        @endif
                    @endif

                </li>
            @endforeach
        </ul>
    </div>
    @push('up')
        <script src="https://code.jquery.com/jquery-3.6.2.min.js"></script>
        <script>
            $(document).ready(function() {

                $('#arriba').click(function() {
                    $('body, html').animate({
                        scrollTop: '0px'
                    }, 300);
                });

                $(window).scroll(function() {
                    if ($(this).scrollTop() > 0) {
                        $('#arriba').slideDown(300);
                    } else {
                        $('#arriba').slideUp(300);
                    }
                });

            });
        </script>
    @endpush
</div>
