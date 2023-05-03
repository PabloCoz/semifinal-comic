<x-admin-layout>
    <div class="flex items-center justify-between">
        <h1 class="font-bold text-2xl">Lista de Categorias</h1>

        <button>
            <a href="{{ route('admin.categories.create') }}"
                class="flex items-center justify-center px-4 py-2 text-sm font-medium text-white bg-blue-600 border border-transparent rounded-md shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                <i class="fa-solid fa-plus"></i>
                <span class="ml-2">Crear Categoria</span>
            </a>
        </button>
    </div>
    @if (session()->has('success-plan'))
        <div class="my-5">
            <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400"
                role="alert">
                <span class="font-medium">{{ session('success-plan') }}</span>
            </div>
        </div>
    @elseif(session()->has('delete-plan'))
        <div class="my-5">
            <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
                role="alert">
                <span class="font-medium">{{ session('delete-plan') }}</span>
            </div>
        </div>
    @endif

    <div class="mt-14">

        <div class="relative overflow-x-auto">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Nombre de categoria
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Slug
                        </th>
                        <th scope="col" class="px-6 py-3">

                        </th>
                        <th scope="col" class="px-6 py-3">

                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $category->name }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $category->slug }}
                            </td>
                            <td class="px-6 py-4">
                                <a href="{{ route('admin.categories.edit', $category) }}"
                                    class="bg-green-500 text-white font-bold rounded-md px-3 py-2">Editar</a>
                            </td>
                            <td class="px-6 py-4">
                                <form action="{{ route('admin.categories.destroy', $category) }}" class="form-delete"
                                    method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="bg-red-600 text-white font-bold rounded-md px-3 py-2"
                                        type="submit">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
    @push('sweet')
        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            // Sweet alert
            $('.form-delete').submit(function(e) {
                e.preventDefault();
                Swal.fire({
                    title: '¿Estas seguro?',
                    text: "¡No podrás revertir esto!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: '¡Si, bórralo!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        this.submit();
                    }
                })
            });
        </script>
    @endpush
</x-admin-layout>
