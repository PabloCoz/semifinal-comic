<?php

namespace App\Listeners;

use App\Models\Money;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

class BuyMoney
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle($event): void
    {
        if ($event->charge->capture == 1) {
            Money::updateOrCreate(
                ['user_id' => $event->user],
                ['quantity' => $event->charge->amount / 100]
            );
        }
    }
}
