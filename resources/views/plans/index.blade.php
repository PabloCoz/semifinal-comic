<x-app-layout>
    <x-slider-component :sliders="$sliders" />

    <section class="bg-black text-white py-4">
        <div class="max-w-6xl mx-auto">
            <div class="mt-4">
                <h1 class="font-bold font-josefin text-3xl text-center">MONEDAS BAPS</h1>

                <article class="my-5 mx-3 md:mx-0">
                    <div class="mx-auto max-w-2xl rounded-3xl ring-1 ring-gray-200 lg:mx-0 lg:flex lg:max-w-none">
                        <div class="p-8 sm:p-10 lg:flex-auto">
                            <p class="mt-6 text-base leading-7 ">Al adquirir una moneda podras visualizar si el creador
                                tiene capitulos en programacion para cierta fecha,mas no podras entrar al capitulo a
                                menos que pagues 2 monedas mas para desbloquearlo.</p>
                            <div class="mt-10 flex items-center gap-x-4">
                                <h4 class="flex-none font-bold font-josefin leading-6 text-rose-500">
                                    ¿Que incluye?
                                </h4>
                                <div class="h-px flex-auto bg-gray-100"></div>
                            </div>
                            <ul role="list"
                                class="mt-8 grid grid-cols-1 gap-4 text-sm leading-6 sm:grid-cols-2 sm:gap-6">
                                <li class="flex gap-x-3 items-center">
                                    <i class="fa-solid fa-check"></i>
                                    Private forum access
                                </li>

                                <li class="flex gap-x-3 items-center">
                                    <i class="fa-solid fa-check"></i>
                                    Member resources
                                </li>

                                <li class="flex gap-x-3 items-center">
                                    <i class="fa-solid fa-check"></i>
                                    Entry to annual conference
                                </li>

                                <li class="flex gap-x-3 items-center">
                                    <i class="fa-solid fa-check"></i>
                                    Official member t-shirt
                                </li>
                            </ul>
                        </div>
                        <div class="-mt-2 p-2 lg:mt-0 lg:w-full lg:max-w-md lg:flex-shrink-0">
                            <div
                                class="rounded-2xl bg-gray-50 py-10 text-center ring-1 ring-inset ring-gray-900/5 lg:flex lg:flex-col lg:justify-center lg:py-16">
                                <div class="mx-auto max-w-xs px-8">
                                    <p class="text-base font-semibold text-gray-600">Pay once, own it forever
                                    </p>
                                    <p class="mt-6 flex items-baseline justify-center gap-x-2">
                                        <span class="text-4xl md:text-5xl font-bold tracking-tight text-gray-900">S/
                                            1.00</span>
                                        <span class="text-sm font-semibold leading-6 tracking-wide text-gray-600">x
                                            moneda</span>
                                    </p>
                                    @auth
                                        @livewire('buy.buy-money')
                                    @else
                                        <button onclick="openModal()"
                                            class="mt-10 block uppercase font-josefin tracking-wide w-full rounded-md bg-rose-600 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm">
                                            Comprar monedas
                                        </button>
                                    @endauth

                                    <p class="mt-6 text-xs leading-5 text-gray-600">Invoices and receipts
                                        available for easy company reimbursement</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </article>
            </div>

            <div class="">
                <h1 class="text-3xl text-center font-bold font-josefin uppercase mb-5">
                    Nuestros planes
                </h1>
            </div>
            <article class="grid grid-cols-1 md:grid-cols-3 gap-4 mx-3 md:mx-0">
                @foreach ($plans as $plan)
                    <div
                        class="w-full max-w-sm p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-8 dark:bg-gray-800 dark:border-gray-700">
                        <h5 class="mb-4 text-xl font-medium text-gray-500 dark:text-gray-400">{{ $plan->name }}</h5>
                        <div class="flex items-baseline text-gray-900 dark:text-white">
                            <span class="text-3xl font-semibold">S/ </span>
                            <span class="text-5xl font-extrabold tracking-tight">{{ $plan->price }}</span>
                            <span
                                class="ml-1 text-xl font-normal text-gray-500 dark:text-gray-400">{{ $plan->interval_count }}
                                x {{ $plan->interval }}</span>
                        </div>
                        <!-- List -->
                        <ul role="list" class="space-y-5 my-7">
                            <li class="flex space-x-3">
                                <!-- Icon -->
                                <svg aria-hidden="true" class="flex-shrink-0 w-5 h-5 text-blue-600 dark:text-blue-500"
                                    fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <title>Check icon</title>
                                    <path fill-rule="evenodd"
                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                <span class="text-base font-normal leading-tight text-gray-500 dark:text-gray-400">2
                                    team
                                    members</span>
                            </li>
                            <li class="flex space-x-3">
                                <!-- Icon -->
                                <svg aria-hidden="true" class="flex-shrink-0 w-5 h-5 text-blue-600 dark:text-blue-500"
                                    fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <title>Check icon</title>
                                    <path fill-rule="evenodd"
                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                <span class="text-base font-normal leading-tight text-gray-500 dark:text-gray-400">20GB
                                    Cloud
                                    storage</span>
                            </li>
                            <li class="flex space-x-3">
                                <!-- Icon -->
                                <svg aria-hidden="true" class="flex-shrink-0 w-5 h-5 text-blue-600 dark:text-blue-500"
                                    fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <title>Check icon</title>
                                    <path fill-rule="evenodd"
                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                <span
                                    class="text-base font-normal leading-tight text-gray-500 dark:text-gray-400">Integration
                                    help</span>
                            </li>
                            <li class="flex space-x-3 line-through decoration-gray-500">
                                <!-- Icon -->
                                <svg aria-hidden="true" class="flex-shrink-0 w-5 h-5 text-gray-400 dark:text-gray-500"
                                    fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <title>Check icon</title>
                                    <path fill-rule="evenodd"
                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                <span class="text-base font-normal leading-tight text-gray-500">Sketch Files</span>
                            </li>
                            <li class="flex space-x-3 line-through decoration-gray-500">
                                <!-- Icon -->
                                <svg aria-hidden="true" class="flex-shrink-0 w-5 h-5 text-gray-400 dark:text-gray-500"
                                    fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <title>Check icon</title>
                                    <path fill-rule="evenodd"
                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                <span class="text-base font-normal leading-tight text-gray-500">API Access</span>
                            </li>
                            <li class="flex space-x-3 line-through decoration-gray-500">
                                <!-- Icon -->
                                <svg aria-hidden="true" class="flex-shrink-0 w-5 h-5 text-gray-400 dark:text-gray-500"
                                    fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <title>Check icon</title>
                                    <path fill-rule="evenodd"
                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                <span class="text-base font-normal leading-tight text-gray-500">Complete
                                    documentation</span>
                            </li>
                            <li class="flex space-x-3 line-through decoration-gray-500">
                                <!-- Icon -->
                                <svg aria-hidden="true" class="flex-shrink-0 w-5 h-5 text-gray-400 dark:text-gray-500"
                                    fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <title>Check icon</title>
                                    <path fill-rule="evenodd"
                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                <span class="text-base font-normal leading-tight text-gray-500">24×7 phone & email
                                    support</span>
                            </li>
                        </ul>
                        @auth
                            <a href="{{ route('payment.index', $plan) }}"
                                class="text-white bg-rose-600 font-bold focus:outline-none rounded-lg text-sm uppercase py-2.5 px-5 inline-flex justify-center w-full">Comprar
                                plan</a>
                        @else
                            <button type="button" onclick="openModal()"
                                class="text-white bg-rose-600 font-bold tracking-wider focus:outline-none rounded-lg text-sm uppercase py-2.5 w-full">Comprar
                                plan</button>
                        @endauth
                    </div>
                @endforeach
            </article>

        </div>
    </section>

    <x-footer />

    @push('open')
        <script>
            function openModal() {
                Livewire.emitTo('modals', 'openModal');
            }
        </script>
    @endpush
</x-app-layout>
