<div>
    <div class="w-full text-center">
        @if (!$subscription)
            <form wire:submit.prevent="create">
                <button type="submit" wire:loading.attr="disabled"
                    class="bg-rose-500 hover:bg-rose-600 text-white w-full p-2 rounded-md uppercase font-bold font-josefin
                disabled:opacity-50">
                    Suscribirse
                </button>
            </form>
        @elseif($subscription->status == 'active' || $subscription->plan_id == $plan->id)
            <form wire:submit.prevent="create">
                <button type="submit" wire:loading.attr="disabled"
                    class="bg-yellow-400 hover:bg-yellow-500 text-black w-full p-2 rounded-md uppercase font-bold font-josefin
                disabled:opacity-50">
                    Cancelar Plan
                </button>
            </form>
        @elseif($subscription->status == 'active' || $subscription->plan_id != $plan->id)
            <form wire:submit.prevent="create">
                <button type="submit" wire:loading.attr="disabled"
                    class="bg-green-600 hover:bg-green-700 text-black hover:text-white w-full p-2 rounded-md uppercase font-bold font-josefin
                disabled:opacity-50">
                    Cambiar Plan
                </button>
            </form>
        @endif
    </div>

</div>
