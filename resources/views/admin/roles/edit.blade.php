<x-admin-layout>
    <div>
        <h1>Editar Rol</h1>
        <div class="mt-4">
            <form action="{{ route('admin.roles.update', $role) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-600">Nombre</label>
                    <input type="text" name="name" id="name"
                        class="block w-full px-4 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                        placeholder="Nombre del rol" value="{{ old('name', $role->name) }}">
                </div>
                <div class="mb-4">
                    <label for="permissions" class="block mb-2 text-sm font-medium text-gray-600">Permisos</label>
                    @foreach ($permissions as $permission)
                        <div class="block mr-4">
                            <input type="checkbox" name="permissions[]" class="rounded" id="permissions" value="{{ $permission->id }}"
                                @if ($role->permissions->contains($permission)) checked @endif>
                            <label for="permissions">{{ $permission->name }}</label>
                        </div>
                    @endforeach
                </div>
                <div class="mb-4">
                    <button type="submit"
                        class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-blue-600 border border-transparent rounded-lg active:bg-blue-600 hover:bg-blue-700 focus:outline-none focus:shadow-outline-blue">
                        Guardar
                    </button>
                </div>
            </form>
        </div>
</x-admin-layout>