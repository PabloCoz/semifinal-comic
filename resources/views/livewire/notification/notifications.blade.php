<div>
    <x-dropdown align="right" width="64">
        <x-slot name="trigger">
            <button type="button" class="relative inline-flex items-center font-medium text-center p-2"
                wire:click="resetNotificationCount()">
                <i class="fa-solid fa-bell text-white ml-2"></i>
                <div
                    class="absolute inline-flex items-center justify-center w-6 h-6 text-xs font-bold text-white bg-red-500 border-2 border-white rounded-full -top-2 -end-2 dark:border-gray-900">
                    {{auth()->user()->notification}}</div>
            </button>
        </x-slot>

        <x-slot name="content">
            <!-- Account Management -->
            <div class="block px-4 py-2 text-xs text-gray-400">
                Notificaciones
            </div>
            <div class="max-h-[calc(100vh-8rem)] overflow-auto">              
                @if ($this->notifications->count())
                    <ul>
                        @foreach ($this->notifications as $item)
                        <li wire:click="read('{{$item->id}}')">
                            <x-dropdown-link href="">
                                {!! $item->data['message'] !!}
                                <br>
                                <span class="text-xs text-gray-400">{{ $item->created_at->diffForHumans() }}</span>
                            </x-dropdown-link>
                        </li>
                        @endforeach
                    </ul>
                    @if (auth()->user()->notifications->count() > $count)
                        <div class="px-4 pt-2 pb-1 flex justify-center">
                            <button wire:click="loadMore()"
                                class="block w-full text-left px-4 py-2 text-xs text-rose-600 font-bold">
                                Ver más notificaciones </button>
                        </div>
                    @endif
                @else
                    <div class="block px-4 py-2 text-xs text-gray-600 font-bold">
                        No hay notificaciones
                    </div>
                @endif
            </div>
        </x-slot>
    </x-dropdown>
</div>