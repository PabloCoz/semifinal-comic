<?php

namespace App\Http\Livewire\Payment;

use App\Events\SubsCreated;
use App\Models\Card;
use App\Models\Plan;
use App\Models\Subscription;
use Livewire\Component;
use Culqi\Culqi;

class SubscriptionCreated extends Component
{
    public $card, $plan;

    public function mount(Card $card, Plan $plan)
    {
        $this->card = $card;
        $this->plan = $plan;
    }

    public function render()
    {
        $subscription = Subscription::where('user_id', auth()->id())
            ->first();
        return view('livewire.payment.subscription-created', compact('subscription'));
    }

    public function create()
    {
        $culqi = new Culqi(array('api_key' => env('CULQI_SECRET_KEY')));


        try {
            $subs = $culqi->Subscriptions->create(
                array(
                    "card_id" => $this->card->card_id,
                    "plan_id" => $this->plan->plan_id,
                )
            );
            $user = auth()->id();
            $charge = $subs->charges[0];

            SubsCreated::dispatch($subs, $user, $charge, $this->plan->id);

            return response()->json('Tarjeta agregada correctamente');
        } catch (\Exception $e) {
            return response()->json($e->getMessage());
        }
    }

    public function update()
    {

    }

    public function cancel()
    {
        
    }
}
