<x-admin-layout>
    <div>
        <h1 class="font-bold text-2xl">Crear Slider</h1>
        <hr class="my-4 border-1 border-gray-200">
        <form action="{{ route('admin.sliders.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <label for="page" class="block text-gray-700 text-sm font-bold mb-2">Página:</label>
                <input type="text" name="page" id="page" class="rounded-lg w-full">
            </div>
            <div class="mb-4">
                <label for="image" class="block text-gray-700 text-sm font-bold mb-2">Imagen:</label>
                <input type="file" name="image" id="image" class="rounded-lg w-full">
            </div>
            <div class="flex mb-4">
                <span
                    class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border border-r-0 border-gray-300 rounded-l-md dark:bg-gray-600 dark:text-gray-400 dark:border-gray-600">
                    {{ env('APP_URL') }}
                </span>
                <input type="text" id="route" name="route" class="rounded-none rounded-r-lg w-full">
            </div>
            <div class="mb-4">
                <button type="submit"
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Crear Slider</button>
            </div>
        </form>
    </div>
</x-admin-layout>
