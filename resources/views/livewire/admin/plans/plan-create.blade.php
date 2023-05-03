<div>
    <button wire:click="$set('open', true)" class="px-4 py-2 bg-green-500 text-white font-bold rounded-lg">
        Crear nuevo plan
    </button>

    <div class="my-5">
        @if (session()->has('error-plan'))
            <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
                role="alert">
                <span class="font-medium"> {{ session('error-plan') }} </span>
            </div>
        @elseif(session()->has('success-plan'))
            <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400"
                role="alert">
                <span class="font-medium"> {{ session('success-plan') }} </span>
            </div>
        @endif
    </div>

    <x-dialog-modal wire:model="open">
        <x-slot name="content">
            <form action="{{ route('api.plan.store') }}" method="POST">
                @csrf
                <div class="mt-4">
                    <x-label value="Nombre del plan" />
                    <x-input type="text" class="w-full" name="name" placeholder="Monedas Baps" />
                    <x-input-error for="name" />
                </div>

                <div class="mt-4">
                    <x-label value="Frecuencia" />
                    <select name="interval" class="rounded-lg w-full">
                        <option value="">Seleccione una frecuencia</option>
                        <option value="dias">Diario</option>
                        <option value="semanas">Semanal</option>
                        <option value="meses">Mensual</option>
                    </select>
                    <x-input-error for="interval" />
                </div>

                <div class="mt-4">
                    <x-label value="Tiempo de duracion" />
                    <x-input type="text" class="w-full" name="interval_count" />
                    <x-input-error for="interval_count" />
                </div>

                <div class="mt-4">
                    <x-label value="Periodo de prueba" />
                    <x-input type="text" class="w-full" name="trial_period_days" />
                    <x-input-error for="trial_period_days" />
                </div>

                <div class="mt-4">
                    <x-label value="Limite de cobro" />
                    <x-input type="text" class="w-full" name="limit" />
                    <x-input-error for="limit" />
                </div>

                <div class="mt-4">
                    <x-label value="Precio" />
                    <x-input type="number" class="w-full" name="price" min="3" />
                    <x-input-error for="price" />
                </div>

                <div class="flex justify-end mt-4">
                    <x-button class="bg-red-600 hover:bg-blue-700">
                        Crear
                    </x-button>
                </div>
            </form>
        </x-slot>
    </x-dialog-modal>
</div>
