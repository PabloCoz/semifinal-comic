<x-admin-layout>
    <div class="">
        <div class="block md:flex justify-between items-center">
            <h1 class="font-bold text-2xl">Lista de preguntas</h1>
            <a href="{{ route('admin.questions.create') }}"
                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Crear pregunta y respuestas
            </a>
        </div>

        <hr class="mt-2 mb-6">
        <section class="mt-4">
            @forelse ($questions as $question)
                <article class="mb-8 bg-white shadow-lg rounded-lg overflow-hidden">
                    <div class="px-6 py-4">
                        <h1 class="mb-2 text-justify font-bold">
                            {{ $question->title }}
                        </h1>
                        <p class="text-sm text-justify mb-2">
                            {{ $question->answer }}
                        </p>
                        <div class="text-gray-700 text-md flex items-center space-x-2">
                            <h1>
                                ({{ $question->email ?? 'Anónimo' }})
                            </h1>

                            <a href="{{ route('admin.questions.edit', $question) }}"
                                class="text-blue-600 hover:underline">
                                Editar pregunta y respuestas
                            </a>
                        </div>
                    </div>
                </article>

            @empty
                <article class="mb-8 bg-white shadow-lg rounded-lg overflow-hidden">
                    <div class="px-6 py-4">
                        <h1 class="text-lg mb-2">
                            No hay preguntas
                        </h1>
                    </div>
                </article>
            @endforelse
        </section>
        <div class="mt-3">
            {{ $questions->links() }}
        </div>
    </div>
</x-admin-layout>
