<x-admin-layout>
    <div>
        <h1 class="text-2xl font-semibold text-gray-900">Roles</h1>
        <div class="mt-4">
            <a href="{{ route('admin.roles.create') }}" class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-blue-600 border border-transparent rounded-lg active:bg-blue-600 hover:bg-blue-700 focus:outline-none focus:shadow-outline-blue">
                Nuevo rol
            </a>
        </div>
        <div class="mt-4">
            <table class="w-full">
                <thead>
                    <tr>
                        <th class="px-4 py-2 text-xs font-medium tracking-wider text-left text-gray-500 uppercase bg-gray-100 border border-gray-200">Name</th>
                        <th class="px-4 py-2 text-xs font-medium tracking-wider text-left text-gray-500 uppercase bg-gray-100 border border-gray-200">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($roles as $role)
                        <tr>
                            <td class="px-4 py-2 text-sm text-gray-900 bg-white border border-gray-200">{{ $role->name }}</td>
                            
                            <td class="px-4 py-2 text-sm text-gray-900 bg-white border border-gray-200 md:space-x-3">
                                <a href="{{ route('admin.roles.edit', $role) }}" class="text-blue-600 hover:text-blue-900">Editar</a>
                                <form action="{{ route('admin.roles.destroy', $role) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-900">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-admin-layout>