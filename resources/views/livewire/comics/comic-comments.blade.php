<div>
    <hr class="my-6 border-white">
    <p class="text-white mb-3 uppercase font-bold font-josefin">
        Comentarios
    </p>
    <form wire:submit.prevent="save()">
        <textarea class="bg-transparent w-full rounded border-2 border-white text-white" wire:model="comment"
            placeholder="Escribe tu comentario">
        </textarea>
        <button class="bg-rosecomic font-bold font-josefin p-2 rounded-full text-white" type="submit">Comentar</button>
    </form>


    <div class="my-8">
        @forelse ($this->comments as $comment)
            <section class="flex items-start py-4">
                <figure>
                    <img class="w-10 h-10 rounded-full" src="{{ $comment->user->profile_photo_url }}" alt="">
                </figure>
                <div class="flex-1 ml-4" x-data="{ 'open': false }">
                    <h1 class="text-white font-josefin font-bold text-lg">
                        {{ $comment->user->username }}
                    </h1>
                    <p class="text-white text-sm">
                        {{ $comment->content }}
                    </p>
                    <div class="mt-2 flex items-center space-x-2">
                        <div class="flex items-center space-x-1">
                            @can('likeComment', $comment)
                                <i class="fa-solid fa-heart text-red-500 cursor-pointer"
                                    wire:click="unlikeComment({{ $comment->id }})"></i>
                            @else
                                <i class="fa-regular fa-heart text-white cursor-pointer"
                                    wire:click="likeComment({{ $comment->id }})"></i>
                            @endcan

                            <h1 class="text-white">{{ $comment->likes->count() }}</h1>
                        </div>

                        <button @click="open = !open"
                            class="flex items-center space-x-1 p-1.5 rounded-lg text-white hover:bg-white hover:text-black cursor-pointer">
                            <i class="fa-solid fa-rotate-left "></i>
                            <h1 class="">Responder</h1>
                        </button>
                    </div>
                    <div class="mt-2" x-show="open">
                        <form wire:submit.prevent="reply({{ $comment->id }})">
                            <textarea class="bg-transparent w-full rounded border-2 border-white text-white" wire:model="respuesta"
                                placeholder="Escribe tu respuesta">
                            </textarea>
                            <button class="bg-rosecomic font-bold font-josefin p-2 rounded-full text-white"
                                type="submit">Responder</button>
                            <button @click="open = !open"
                                class="bg-red-600 font-bold font-josefin p-2 rounded-full text-white"
                                type="button">Cancelar</button>
                        </form>
                    </div>
                    @if ($comment->replies)
                        <p class="text-white text-sm">
                            @foreach ($comment->replies as $reply)
                                <section class="flex items-start py-4">
                                    <figure>
                                        <img class="w-10 h-10 rounded-full" src="{{ $reply->user->profile_photo_url }}"
                                            alt="">
                                    </figure>
                                    <div class="flex-1 ml-4">
                                        <h1 class="text-white font-josefin font-bold text-lg">
                                            {{ $reply->user->username }}
                                        </h1>
                                        <p class="text-white text-sm">
                                            {{ $reply->content }}
                                        </p>
                                    </div>
                                </section>
                            @endforeach
                        </p>
                    @endif
                </div>
            </section>
        @empty
            <p class="text-white text-center">No hay comentarios</p>
        @endforelse
    </div>

</div>
