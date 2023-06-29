<x-admin-layout>
    <div class="">
        <h1 class="font-bold text-2xl">Editar pregunta y respuestas</h1>
        <hr class="mt-2 mb-6">
        <section class="mt-4">
            <article class="mb-8 bg-white shadow-lg rounded-lg overflow-hidden">
                <div class="px-6 pt-4 pb-2">
                    <form action="{{ route('admin.questions.update', $question) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <label for="title" class="block text-gray-700 text-sm mb-2">Pregunta</label>
                        <input type="text" class="w-full rounded-md" name="title" id="title"
                            value="{{ $question->title }}">
                        <div class="my-4">
                            <label for="answer" class="block text-gray-700 text-sm mb-2">Respuesta</label>
                            <textarea name="answer" id="answer" class="rounded w-full whitespace-nowrap" class="w-full">
                                {{ $question->answer }}
                            </textarea>
                            @error('answer')
                                <span class="text-xs text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                        <div>
                            <label for="is_public">Publicar</label>
                            <input type="checkbox" class="rounded" name="is_public" id="is_public" value="1"
                                {{ $question->is_public ? 'checked' : '' }}>
                        </div>
                        <div class="flex justify-end">
                            <button type="submit" class="bg-green-500 text-white p-3 rounded-md">Editar
                                respuesta</button>
                        </div>
                    </form>
                </div>
            </article>
        </section>
    </div>
</x-admin-layout>
