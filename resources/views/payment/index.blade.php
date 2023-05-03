<x-app-layout>
    <div class="max-w-6xl mx-auto px-6 lg:px-8 py-5">
        <div class="grid grid-cols-1 md:grid-cols-6 lg:grid-cols-8 gap-3">
            <div class="md:col-span-4 lg:col-span-5">
                <h1 class="text-left font-bold text-2xl uppercase">Finalizar Pagos</h1>
                <hr class="my-4 border border-gray-700">
                @livewire('payment.client-created')
                <hr class="my-4 border border-gray-700">
                @if (auth()->user()->client)
                    @livewire('payment.card-created')
                @else
                    <div>
                        <p class="text-center text-red-500 font-bold">Debe registrar sus datos para poder continuar</p>
                    </div>
                @endif
                @if ($card)
                    <hr class="my-4 border border-gray-700">
                    <div>
                        @livewire('payment.subscription-created', ['plan' => $plan, 'card' => $card])
                    </div>
                @endif
            </div>
            <div class="md:col-span-2 md:col-start-5 lg:col-start-7">
                <div class="bg-white overflow-hidden rounded-lg shadow-md">
                    <div class="p-4">
                        <h1 class="font-bold text-2xl font-josefin text-center">Plan: <span
                                class="underline">{{ $plan->name }}</span></h1>
                        <p class="mt-4 text-justify">
                            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Tenetur aliquid quae eaque, nihil
                            eveniet cumque aut provident maxime at nesciunt omnis itaque dolorem ipsam molestias minus,
                            labore dicta! Eveniet, cum.
                        </p>
                        <hr class="my-5 border border-gray-600">
                        <div class="mt-4">
                            <h1 class="font-bold text-xl">
                                Tipo de pago: <span class="">Por {{ $plan->interval }}</span>
                            </h1>
                            <h1 class="font-bold text-xl">Total: <span class="">S/ {{ $plan->price }}</span></h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
