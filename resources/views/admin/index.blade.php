<x-admin-layout>
    <div>
        <h1 class="text-2xl font-bold">Dashboard</h1>

        <div class="class mt-3">
            <section class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                <article class="bg-gray-100 overflow-hidden rounded-lg shadow-lg ">
                    <div class="p-8">
                        <h1 class="font-bold uppercase text-sm tracking-widest">Comics</h1>
                        <section class="flex items-center justify-center">
                            <h1 class="text-6xl font-bold my-5 text-red-600">
                                {{ $countComics }}
                            </h1>
                        </section>
                        <p class="block text-center font-bold text-red-600 tracking-wider">Publicados</p>
                    </div>
                </article>
                <article class="bg-gray-100 overflow-hidden rounded-lg shadow-lg ">
                    <div class="p-8">
                        <h1 class="font-bold uppercase text-sm tracking-widest">usuarios</h1>
                        <section class="flex items-center justify-center">
                            <h1 class="text-6xl font-bold my-5 text-blue-600">
                                {{ $countUsers }}
                            </h1>
                        </section>
                        <p class="block text-center font-bold text-blue-600 tracking-wider">Registrados</p>
                    </div>
                </article>
                <article class="bg-gray-100 overflow-hidden rounded-lg shadow-lg ">
                    <div class="p-8">
                        <h1 class="font-bold uppercase text-sm tracking-widest">Creadores</h1>
                        <section class="flex items-center justify-center">
                            <h1 class="text-6xl font-bold my-5 text-orange-400">
                                {{ $countCreators }}
                            </h1>
                        </section>
                        <p class="block text-center font-bold text-orange-400 tracking-wider">Activos</p>
                    </div>
                </article>
            </section>
        </div>
    </div>
</x-admin-layout>
