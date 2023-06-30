<div>
    @foreach ($chapters as $chapter)
        <div class="p-2 ">
            <div class="bg-gray-200 p-2 w-full rounded-lg flex justify-between items-center">
                <div class="flex items-center">
                    <img src="{{ Storage::url($chapter->image) }}" class="h-20 " alt="">
                    <h1 class="text-sm md:text-lg font-bold font-josefin">{{ $chapter->position }}.
                        {{ $chapter->name }}
                    </h1>
                </div>
                <div class="">
                    <div class="flex items-center space-x-2">
                        @livewire('comics.chapter-like', ['chapter' => $chapter, 'comic' => $comic])
                        @can('enrolled', $comic)
                            <a href="{{ route('comics.status', ['comic' => $comic, 'chapter' => $chapter]) }}"
                                class="p-1 hover:bg-rose-500 rounded-lg hover:text-white">
                                <i class="fa-solid fa-right-from-bracket"></i>
                            </a>
                        @elsecan('Revisar Comic (administrador)')
                            <a href="{{ route('comics.status', ['comic' => $comic, 'chapter' => $chapter]) }}"
                                class="p-1 hover:bg-rose-500 rounded-lg hover:text-white">
                                <i class="fa-solid fa-right-from-bracket"></i>
                            </a>
                        @endcan
                    </div>
                </div>
            </div>

        </div>
    @endforeach
</div>
