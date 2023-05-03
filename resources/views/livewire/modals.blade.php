<div>
    <button wire:click="$set('open', true)"
        class="px-4 py-3 bg-rose-600 rounded-full text-white uppercase text-xs font-bold tracking-wider">
        Iniciar Sesión
    </button>

    <x-dialog-modal wire:model="open" :maxWidth="'lg'">
        <x-slot name="content">
            <div x-data="{
                openTab: 1,
                activeClasses: 'border-b-2 border-rose-500 font-bold',
            }">
                <ul class="flex justify-center items-center space-x-3">
                    <li class="cursor-pointer" @click="openTab = 1">
                        <a class="uppercase text-xs tracking-widest p-2"
                            :class="openTab == 1 ? activeClasses : ''">Iniciar Sesión</a>
                    </li>
                    <li class="cursor-pointer" @click="openTab = 2">
                        <a class="uppercase text-xs tracking-widest p-2"
                            :class="openTab == 2 ? activeClasses : ''">Registrarse</a>
                    </li>
                </ul>

                <div class="mt-5">
                    <div x-show="openTab == 1">
                        @include('auth.login')
                    </div>
                    <div x-show="openTab == 2">
                        @include('auth.register')
                    </div>
                </div>

            </div>

        </x-slot>
    </x-dialog-modal>
</div>

