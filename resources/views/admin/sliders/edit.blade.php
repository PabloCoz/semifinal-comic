<x-admin-layout>
    <div>
        <h1 class="font-bold text-2xl">Editar Slider</h1>
        <hr class="my-4 border-1 border-gray-200">
        <form action="{{ route('admin.sliders.update', $slider) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="page" class="block text-gray-700 text-sm font-bold mb-2">Página:</label>
                <input type="text" name="page" id="page" class="rounded-lg w-full" value="{{ $slider->page }}">
            </div>
            <div class="mb-4 flex space-x-4">
                <img id="img" src="{{ Storage::url($slider->url) }}" alt=""
                    class="w-64 h-40 object-cover rounded-lg">
                <div class="flex-1">
                    <label for="url" class="block text-gray-700 text-sm font-bold mb-2">Imagen:</label>
                    <input type="file" name="url" id="url" class="rounded-lg w-full">
                </div>
            </div>
            <div>
                <label class="block text-gray-700 text-sm font-bold mb-2">Ruta:</label>
            </div>
            <div class="flex mb-4">

                <span
                    class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border border-r-0 border-gray-300 rounded-l-md dark:bg-gray-600 dark:text-gray-400 dark:border-gray-600">
                    {{ env('APP_URL') }}
                </span>
                <input type="text" id="website-admin" class="rounded-none rounded-r-lg w-full"
                    value="{{ $slider->route }}">
            </div>
            <div class="mb-4">
                <button type="submit"
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Editar Slider</button>


            </div>
        </form>
    </div>

    <script>
        //Renderizar imagen

        const img = document.querySelector('#img');
        const url = document.querySelector('#url');

        url.addEventListener('change', (e) => {
            const file = e.target.files[0];
            const reader = new FileReader();
            reader.readAsDataURL(file);
            reader.onload = () => {
                img.src = reader.result;
            }
        })
    </script>
</x-admin-layout>
