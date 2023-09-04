<div>
    <div class="max-w-2xl mx-auto px-6 lg:px-8 bg-white mt-5 rounded-lg overflow-hidden py-4">
        <!-- Alertas -->
        @if (session()->has('message'))
            <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400"
                role="alert">
                <span class="font-medium">{{ session('message') }}</span>
            </div>
        @elseif (session()->has('error'))
            <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
                role="alert">
                <span class="font-medium">{{ session('error') }}</span>
            </div>
        @endif
        <div class="space-y-6">
            <form wire:submit.prevent="store">
                <div class="border-b border-gray-900/10 pb-12">
                    <h2 class="text-base font-semibold leading-7 text-gray-900">Perfil de Creador</h2>

                    <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                        <div class="sm:col-span-3">
                            <label for="first-name"
                                class="block text-sm font-medium leading-6 text-gray-900">Nombres</label>
                            <div class="mt-2">
                                <input type="text" wire:model="profile.name"
                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>
                            @error('profile.name')
                                <span class="text-red-500 text-xs">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="sm:col-span-3">
                            <label for="last-name"
                                class="block text-sm font-medium leading-6 text-gray-900">Apellidos</label>
                            <div class="mt-2">
                                <input type="text" wire:model="profile.lastname"
                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>
                            @error('profile.lastname')
                                <span class="text-red-500 text-xs">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="sm:col-span-4">
                            <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Correo
                                Electronico</label>
                            <div class="mt-2">
                                <input id="email" wire:model="profile.email" type="email"
                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>
                            @error('profile.email')
                                <span class="text-red-500 text-xs">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="sm:col-span-3">
                            <label for="country"
                                class="block text-sm font-medium leading-6 text-gray-900">Países</label>
                            <div class="mt-2">
                                <div class="mt-2">
                                    <input id="country" wire:model="profile.country" type="text"
                                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                </div>
                            </div>
                            @error('profile.country')
                                <span class="text-red-500 text-xs">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="sm:col-span-3">
                            <label for="phone"
                                class="block text-sm font-medium leading-6 text-gray-900">Celular</label>
                            <div class="mt-2">
                                <div class="mt-2">
                                    <input id="phone" wire:model="profile.phone" type="number"
                                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                </div>
                            </div>
                            @error('profile.phone')
                                <span class="text-red-500 text-xs">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-span-full">
                            <label for="street-address"
                                class="block text-sm font-medium leading-6 text-gray-900">Dirección</label>
                            <div class="mt-2">
                                <input type="text" wire:model="profile.address" id="street-address"
                                    autocomplete="street-address"
                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>
                            @error('profile.address')
                                <span class="text-red-500 text-xs">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="sm:col-span-2 sm:col-start-1">
                            <label for="city"
                                class="block text-sm font-medium leading-6 text-gray-900">Ciudad</label>
                            <div class="mt-2">
                                <input type="text" wire:model="profile.city" id="city"
                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>
                            @error('profile.city')
                                <span class="text-red-500 text-xs">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="sm:col-span-2">
                            <label for="facebook"
                                class="block text-sm font-medium leading-6 text-gray-900">Facebook</label>
                            <div class="mt-2">
                                <input type="text" wire:model="profile.facebook" id="facebook"
                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>
                            @error('profile.facebook')
                                <span class="text-red-500 text-xs">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="sm:col-span-2">
                            <label for="instagram"
                                class="block text-sm font-medium leading-6 text-gray-900">Instagram</label>
                            <div class="mt-2">
                                <input type="text" wire:model="profile.instagram" id="instagram"
                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>
                            @error('profile.instagram')
                                <span class="text-red-500 text-xs">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-span-full">
                            <label for="bio"
                                class="block text-sm font-medium leading-6 text-gray-900">Biografia</label>
                            <div class="mt-2">
                                <textarea id="bio" wire:model="profile.bio" rows="3" placeholder="Escribe algo sobre ti..."
                                    class="block w-full rounded-md border-0 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:py-1.5 sm:text-sm sm:leading-6"></textarea>
                            </div>
                            @error('profile.bio')
                                <span class="text-red-500 text-xs">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-span-full">
                            <label for="cover-photo" class="block text-sm font-medium leading-6 text-gray-900">Foto de
                                portada</label>

                            <div>
                                @if ($img)
                                    <img src="{{ $img->temporaryUrl() }}" class="w-1/2">
                                @else
                                    @if (auth()->user()->profile->front_page)
                                        <img src="{{ Storage::url($profile['front_page']) }}" class="w-1/2">
                                    @endif
                                @endif

                                <div class="mt-4 flex justify-center">
                                    <label for="img"
                                        class="relative cursor-pointer rounded-md font-semibold text-indigo-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-indigo-600 focus-within:ring-offset-2 hover:text-indigo-500">
                                        <span>Upload a file</span>
                                        <input id="img" wire:model="img" type="file" accept="image/*"
                                            class="sr-only">
                                    </label>
                                </div>
                            </div>

                            @error('profile.front_page')
                                <span class="text-red-500 text-xs">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                </div>
                <div class="mt-6 flex items-center justify-end gap-x-6">
                    <a href="{{ route('home') }}"
                        class="text-sm font-semibold text-white rounded-md bg-red-600 px-3 py-2">Cancelar</a>
                    <button
                        class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Guardar</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        //Renderizar imagen de front_page

        window.addEventListener('profile-front_page', event => {
            let reader = new FileReader();
            reader.onload = (e) => {
                document.getElementById('front_page').src = e.target.result;
            };
            reader.readAsDataURL(event.detail.file);
        });
    </script>
</div>
