<div class="mx-3">
    @if (count($posts))
        @foreach ($posts as $post)
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
                            <div>
                                <button class="focus:outline-none">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                        class="w-6 h-6 hover:text-green-400">
                                        <path
                                            d="M21.731 2.269a2.625 2.625 0 00-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 000-3.712zM19.513 8.199l-3.712-3.712-8.4 8.4a5.25 5.25 0 00-1.32 2.214l-.8 2.685a.75.75 0 00.933.933l2.685-.8a5.25 5.25 0 002.214-1.32l8.4-8.4z" />
                                        <path
                                            d="M5.25 5.25a3 3 0 00-3 3v10.5a3 3 0 003 3h10.5a3 3 0 003-3V13.5a.75.75 0 00-1.5 0v5.25a1.5 1.5 0 01-1.5 1.5H5.25a1.5 1.5 0 01-1.5-1.5V8.25a1.5 1.5 0 011.5-1.5h5.25a.75.75 0 000-1.5H5.25z" />
                                    </svg>
                                </button>
                                <button wire:click="deletePost({{ $post->id }})">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                        class="w-6 h-6 hover:text-red-400">
                                        <path fill-rule="evenodd"
                                            d="M16.5 4.478v.227a48.816 48.816 0 013.878.512.75.75 0 11-.256 1.478l-.209-.035-1.005 13.07a3 3 0 01-2.991 2.77H8.084a3 3 0 01-2.991-2.77L4.087 6.66l-.209.035a.75.75 0 01-.256-1.478A48.567 48.567 0 017.5 4.705v-.227c0-1.564 1.213-2.9 2.816-2.951a52.662 52.662 0 013.369 0c1.603.051 2.815 1.387 2.815 2.951zm-6.136-1.452a51.196 51.196 0 013.273 0C14.39 3.05 15 3.684 15 4.478v.113a49.488 49.488 0 00-6 0v-.113c0-.794.609-1.428 1.364-1.452zm-.355 5.945a.75.75 0 10-1.5.058l.347 9a.75.75 0 101.499-.058l-.346-9zm5.48.058a.75.75 0 10-1.498-.058l-.347 9a.75.75 0 001.5.058l.345-9z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </button>
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
        @endforeach
    @else
        <div>
            <h1 class="text-white font-josefin my-4 text-center text-xl">No hay publicaciones...</h1>
        </div>
    @endif

</div>
