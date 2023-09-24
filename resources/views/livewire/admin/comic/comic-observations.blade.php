<div>
    <button wire:click="$set('open', true)" class="rounded-full p-3 bg-yellow-400 font-bold font-josefin uppercase">
        Rechazar comic
    </button>

    <x-dialog-modal wire:model="open">
        <x-slot name="content">
            <div class="mb-4">
                <h1 class="font-josefin text-lg">
                    Observaciones para el comic: <span class="font-bold">{{ $comic->title }}</span>
                </h1>
            </div>

            <div class="mb-4">
                <textarea wire:model="observation" class="w-full rounded-md" rows="2"></textarea>
                <x-input-error for="observation" />
            </div>

            <div class="mt-4 flex items-center justify-end space-x-3">
                <x-secondary-button wire:click="$set('open', false)">
                    Cancelar
                </x-secondary-button>

                <x-danger-button wire:click="reject" wire:loading.attr="disabled" class="disabled:opacity-25">
                    Rechazar
                </x-danger-button>
            </div>
        </x-slot>
    </x-dialog-modal>
</div>
