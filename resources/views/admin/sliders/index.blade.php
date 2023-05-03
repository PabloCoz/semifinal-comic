<x-admin-layout>
    <div class="flex justify-between items-center">
        <h1 class="font-bold text-2xl">Sliders para las páginas</h1>
        <a href="{{ route('admin.sliders.create') }}"
            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Crear Slider</a>
    </div>
    <hr class="my-4 border-1 border-gray-200">
    <!-- Table -->

    <div class="relative overflow-x-auto">
        <table class="w-full text-sm text-left text-gray-500 rounded-lg">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Pagina
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Imagen
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Ruta
                    </th>
                    <th scope="col" class="px-6 py-3">

                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($sliders as $slider)
                    <tr class="bg-white border-b">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900">
                            {{ $slider->page }}
                        </th>
                        <td class="px-6 py-4">
                            <img src="{{ Storage::url($slider->url) }}" alt="" class="w-32">
                        </td>
                        <td class="px-6 py-4">
                            {{ env('APP_URL') . $slider->route }}
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex justify-between items-center space-x-2">
                                <a href="{{ route('admin.sliders.edit', $slider) }}"
                                    class="text-blue-500 hover:text-blue-700">Editar</a>
                                <form action="{{ route('admin.sliders.destroy', $slider) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Eliminar
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="mt-3">
            {{ $sliders->links() }}
        </div>
    </div>

</x-admin-layout>
