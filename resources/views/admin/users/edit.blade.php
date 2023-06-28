<x-admin-layout>
    <h1>Editar permisos</h1>
    <div class="mt-4">
        <div class="bg-gray-100 rounded-lg overflow-hidden shadow-md">
            <div class="px-4 py-3">
                <h1 class="font-bold text-gray-800">Nombre:<span class="font-light"> {{ $user->profile->name }}</span>
                </h1>
                <h1 class="font-bold text-gray-800">Email: {{ $user->profile->email }}</h1>
                <h1 class="font-bold text-gray-800">Username: {{ $user->username }}</h1>
                <h1 class="font-bold text-gray-800">Rol:
                    @foreach ($user->roles as $item)
                        "{{ $item->name }}"
                    @endforeach
                </h1>
            </div>

            <form action="{{ route('admin.users.update', $user) }}" method="POST">
                @method('PUT')
                @csrf
                <div class="px-4 py-3">
                    <h1 class="font-bold text-gray-800">Roles</h1>
                    @foreach ($roles as $role)
                        <label class="inline-flex items-center mt-3">
                            <input type="checkbox" name="roles[]" value="{{ $role->id }}"
                                {{ $user->roles->contains($role->id) ? 'checked' : '' }}
                                class="form-checkbox h-5 w-5 text-gray-600"><span
                                class="ml-2 text-gray-700">{{ $role->name }}</span>
                        </label>
                    @endforeach
                </div>
                <div class="px-4 py-3">
                    <button type="submit" class="bg-blue-600 text-white font-bold px-3 py-2 rounded-lg">Actualizar
                        permisos</button>
                </div>
            </form>
        </div>

    </div>
</x-admin-layout>
