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


    <div class="mt-8">
        @forelse ($chapter->comments as $comment)
            <section class="flex items-center">
                <figure>
                    <img class="w-10 h-10 rounded-full" src="{{ $comment->user->profile_photo_url }}" alt="">
                </figure>
                <div class="flex-1 ml-4">
                    <h1 class="text-white font-josefin font-bold text-lg">
                        {{ $comment->user->username }}
                    </h1>
                    <p class="text-white text-sm">
                        {{ $comment->content }}
                    </p>
                </div>
            </section>
        @empty
            <p class="text-white text-center">No hay comentarios</p>
        @endforelse
    </div>

</div>
