<x-admin-layout>
    <div>
        <h1 class="text-2xl font-bold">Lista de comics pendientes de revisión</h1>
        <hr class="my-5 border border-gray-200">
    </div>

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Nombre de comic
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Autor
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Categoria
                    </th>
                    <th scope="col" class="px-6 py-3">
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($comics as $comic)
                    <tr class="bg-white border-b">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900">
                            {{ $comic->title }}
                        </th>
                        <td class="px-6 py-4 capitalize">
                            {{ $comic->user->username }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $comic->category->name }}
                        </td>
                        <td class="px-6 py-4">
                            <a href="{{ route('admin.comics.show', $comic) }}"
                                class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Revisar</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="mt-5">
        {{ $comics->links() }}
    </div>


</x-admin-layout>
