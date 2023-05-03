<?php

namespace App\Http\Livewire\Payment;

use App\Models\Card;
use Livewire\Component;
use Culqi\Culqi;

class CardCreated extends Component
{
    public $card;

    public function mount(Card $card)
    {
        $this->card = $card->where('customer_id', auth()->user()->id)->get();
    }
    public function render()
    {
        return view('livewire.payment.card-created');
    }

    public function setDefaultCard(Card $card)
    {
        $cards = Card::where('customer_id', auth()->user()->id)->get();

        foreach ($cards as $crd) {
            $crd->update([
                'default' => false
            ]);
        }

        $card->update([
            'default' => true
        ]);

        $this->card = $card->where('customer_id', auth()->user()->id)->get();
    }

    public function deleteCard(Card $card)
    {
        $culqi = new Culqi(array('api_key' => env('CULQI_SECRET_KEY')));
        $culqi->Cards->delete($card->card_id);
        $card->delete();
        $this->card = $card->where('customer_id', auth()->user()->id)->get();
    }
}
