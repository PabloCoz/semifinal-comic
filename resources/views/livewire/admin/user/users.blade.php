<div>
    <div>
        <h1 class="font-bold text-2xl">Lista de usuarios</h1>
    </div>
    <hr class="border border-gray-200 my-4">

    <input type="search" wire:model="search" wire:keydown="clearPage" class="w-full rounded-lg mb-5"
        placeholder="Buscar usuario...">

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3">
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Nombre de usuario
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Estado
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Creador
                    </th>
                    <th scope="col" class="px-6 py-3">
                    </th>
                </tr>
            </thead>
            <tbody>
                @forelse ($users as $user)
                    <tr class="bg-white border-b">
                        <th scope="row" class="px-6 py-4 font-medium ">
                            <img src="{{ $user->profile_photo_url }}" class="h-14 w-14 rounded-full" alt="" loading="lazy">
                        </th>
                        <td class="px-6 py-4">
                            <h1 class="font-bold text-gray-800">{{ $user->username }}</h1>
                        </td>
                        <td class="px-6 py-4">
                            <span
                                class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                Activo
                            </span>
                        </td>
                        <td class="px-6 py-4">
                            {{ $user->is_creator ? 'Si' : 'No' }}
                        </td>
                        <td class="px-6 py-4">
                            @if ($user->status == 1)
                                <button wire:click="blockUser({{ $user }})"
                                    class="bg-red-600 text-white font-bold px-3 py-2 rounded-lg">
                                    Bloquear usuario
                                </button>
                            @else
                                <button wire:click="unblockUser({{ $user }})"
                                    class="bg-green-600 text-white font-bold px-3 py-2 rounded-lg">
                                    Desbloquear usuario
                                </button>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr class="bg-white border-b">
                        <td class="px-6 py-4 text-center" colspan="4">
                            No hay resultados para la busqueda.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="mt-5">
        {{ $users->links() }}
    </div>

</div>
