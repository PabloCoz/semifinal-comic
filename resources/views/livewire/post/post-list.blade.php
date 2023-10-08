<div class="mx-3">
    <div class="relative z-30 top-0">
        @forelse ($posts as $post)
            <div class="overflow-hidden bg-gray-700 rounded-lg shadow-md shadow-gray-600 mt-4">
                <div class="px-5 py-4 text-white">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center justify-start">
                            <div>
                                <img src="{{ $post->user->profile_photo_url }}" alt=""
                                    class="h-12 w-12 rounded-full object-cover object-center" loading="lazy">
                            </div>
                            <div class="block ml-1">
                                <h1 class="font-bold">{{ $post->user->username }}</h1>
                                <p class="text-xs">{{ $post->created_at->diffForHumans() }}</p>
                            </div>

                        </div>
                        @if ($post->user_id == auth()->id())
                            <div class="flex items-center space-x-1">
                                @livewire('post.post-edit', ['post' => $post], key($post->id))
                                <div>
                                    <button wire:click="deletePost({{ $post->id }})">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                            class="w-6 h-6 hover:text-red-400">
                                            <path fill-rule="evenodd"
                                                d="M16.5 4.478v.227a48.816 48.816 0 013.878.512.75.75 0 11-.256 1.478l-.209-.035-1.005 13.07a3 3 0 01-2.991 2.77H8.084a3 3 0 01-2.991-2.77L4.087 6.66l-.209.035a.75.75 0 01-.256-1.478A48.567 48.567 0 017.5 4.705v-.227c0-1.564 1.213-2.9 2.816-2.951a52.662 52.662 0 013.369 0c1.603.051 2.815 1.387 2.815 2.951zm-6.136-1.452a51.196 51.196 0 013.273 0C14.39 3.05 15 3.684 15 4.478v.113a49.488 49.488 0 00-6 0v-.113c0-.794.609-1.428 1.364-1.452zm-.355 5.945a.75.75 0 10-1.5.058l.347 9a.75.75 0 101.499-.058l-.346-9zm5.48.058a.75.75 0 10-1.498-.058l-.347 9a.75.75 0 001.5.058l.345-9z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        @endif
                    </div>
                    @if ($post->images)
                        @foreach ($post->images as $image)
                            <div class="my-2">
                                <img src="{{ Storage::url($image->url) }}" alt=""
                                    class="w-full h-64 object-contain object-center rounded-lg" loading="lazy">
                            </div>
                        @endforeach
                    @endif

                    <div class="mt-2">
                        <div class="flex items-center">
                            <p class="font-josefin text-lg w-full">
                                {{ $post->description }}
                            </p>
                            <div class="flex-1">
                                <div class="flex items-center">
                                    <h1 class="mr-1 font-josefin">{{ $post->likes->count() }}</h1>
                                    @can('likes', $post)
                                        <button wire:click="dislike({{ $post->id }})">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                                class="w-6 h-6 text-red-500">
                                                <path
                                                    d="M11.645 20.91l-.007-.003-.022-.012a15.247 15.247 0 01-.383-.218 25.18 25.18 0 01-4.244-3.17C4.688 15.36 2.25 12.174 2.25 8.25 2.25 5.322 4.714 3 7.688 3A5.5 5.5 0 0112 5.052 5.5 5.5 0 0116.313 3c2.973 0 5.437 2.322 5.437 5.25 0 3.925-2.438 7.111-4.739 9.256a25.175 25.175 0 01-4.244 3.17 15.247 15.247 0 01-.383.219l-.022.012-.007.004-.003.001a.752.752 0 01-.704 0l-.003-.001z" />
                                            </svg>
                                        </button>
                                    @else
                                        <button wire:click="like({{ $post->id }})">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                                class="w-6 h-6">
                                                <path
                                                    d="M11.645 20.91l-.007-.003-.022-.012a15.247 15.247 0 01-.383-.218 25.18 25.18 0 01-4.244-3.17C4.688 15.36 2.25 12.174 2.25 8.25 2.25 5.322 4.714 3 7.688 3A5.5 5.5 0 0112 5.052 5.5 5.5 0 0116.313 3c2.973 0 5.437 2.322 5.437 5.25 0 3.925-2.438 7.111-4.739 9.256a25.175 25.175 0 01-4.244 3.17 15.247 15.247 0 01-.383.219l-.022.012-.007.004-.003.001a.752.752 0 01-.704 0l-.003-.001z" />
                                            </svg>
                                        </button>
                                    @endcan
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        @empty
            <div>
                <h1 class="text-white font-josefin my-4 text-center text-xl">No hay publicaciones...</h1>
            </div>
        @endforelse
        @can('premiun', $user, auth()->user())
        @else
            <div
                class="absolute top-0 left-0 w-full h-full md:h-full object-center object-cover md:object-center z-10 backdrop-blur-3xl p-4 rounded-lg">
                <div class="flex items-center justify-center">
                    <h1 class="font-bold text-white text-center text-2xl font-josefin">
                        Empieza a seguir a {{ $user->username }} para ver sus publicaciones
                    </h1>
                </div>
                <div class="flex items-center justify-center mt-5">
                    <form action="{{ route('users.premium', $user) }}" method="POST">
                        @csrf
                        <button type="submit" class="p-3 bg-sky-400 rounded-full font-bold w-full">
                            Seguir
                        </button>
                    </form>
                </div>
            </div>
        @endcan
    </div>
</div>
