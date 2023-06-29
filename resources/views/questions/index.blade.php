<x-app-layout>
    <x-slider-component :sliders="$sliders" />

    <section class="bg-black text-white py-10">
        <div class="max-w-3xl mx-2 md:mx-auto ">
            <div class="my-3">
                @if (session()->has('success'))
                    <div class="bg-green-500 text-white p-3 rounded-md">
                        {{ session('success') }}
                    </div>
                @endif
            </div>
            <h1 class="font-bold text-2xl uppercase font-josefin">Preguntas frecuentes</h1>
            <div class="mt-4">
                @forelse ($questions as $question)
                    <article class="bg-gray-800 overflow-hidden rounded-md shadow mb-4">
                        <div class="p-3">
                            <h1 class="font-bold text-lg">{{ $question->title }}</h1>
                            <p class="text-sm text-gray-400">{{ $question->answer }}</p>
                        </div>
                    </article>
                @empty
                    <article class="bg-gray-800 overflow-hidden rounded-md shadow">
                        <div class="p-3">
                            <h1 class="font-bold text-lg">No hay preguntas</h1>
                        </div>
                    </article>
                @endforelse
            </div>

            <hr class="border border-white my-7">
            <h1 class="font-bold text-xl uppercase font-josefin">Déjanos tus dudas o consultas</h1>
            <div class="mt-4">
                <form action="{{ route('faq.store') }}" method="POST">
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label for="email" class="font-bold">Correo</label>
                            <input type="email" name="email" id="email"
                                class="block w-full mt-1 rounded-md bg-gray-700 font-bold text-white"
                                placeholder="typicalbaps@gmail.com">
                        </div>
                    </div>
                    <div class="mt-4">
                        <label for="title" class="font-bold">Pregunta</label>
                        <textarea name="title" id="title" cols="30" rows="10" class="block w-full mt-1 rounded-md bg-gray-700"
                            placeholder="Escribe tu pregunta"></textarea>
                    </div>
                    <div class="mt-4">
                        <button type="submit"
                            class="bg-rose-600 p-2 rounded-md tracking-wider font-bold font-josefin uppercase">Enviar</button>
                    </div>
                </form>
            </div>
    </section>

    <div>
        <x-footer />
    </div>
</x-app-layout>
