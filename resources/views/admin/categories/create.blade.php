<x-admin-layout>
    <div>
        <h1 class="font-bold text-2xl">Crear Categoria</h1>
        <form action="{{ route('admin.categories.store') }}" method="POST">
            @csrf
            <div class="mt-4">
                <label for="name" class="block text-sm font-medium text-gray-700">Nombre de la categoria</label>
                <div class="mt-1">
                    <input type="text" name="name" id="name" value="{{ old('name') }}"
                        class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                </div>
                @error('name')
                    <span class="text-xs text-red-500">{{ $message }}</span>
                @enderror
            </div>
            <div class="mt-4">
                <label for="slug" class="block text-sm font-medium text-gray-700">Slug</label>
                <div class="mt-1">
                    <input type="text" name="slug" id="slug" value="{{ old('slug') }}" disabled
                        class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                </div>
                @error('slug')
                    <span class="text-xs text-red-500">{{ $message }}</span>
                @enderror
            </div>
            <div class="mt-4">
                <button type="submit" class="bg-red-600 text-white rounded-md px-3 py-2 font-bold">Guardar</button>
            </div>
        </form>
    </div>

    <script>
        document.getElementById("name").addEventListener('keyup', slugChange);

        function slugChange() {

            name = document.getElementById("name").value;
            document.getElementById("slug").value = slug(name);

        }

        function slug(str) {
            var $slug = '';
            var trimmed = str.trim(str);
            $slug = trimmed.replace(/[^a-z0-9-]/gi, '-').
            replace(/-+/g, '-').
            replace(/^-|-$/g, '');
            return $slug.toLowerCase();
        }
    </script>

</x-admin-layout>
