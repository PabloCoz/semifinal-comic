<?php

namespace App\Listeners;

use App\Models\Subscription;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

class SubsCreated
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
            Subscription::updateOrCreate(
                ['user_id' => $event->user],
                [
                    'plan_id' => $event->plan,
                    'subscription_id' => $event->subs->id,
                    'status' => $event->subs->status,
                ],
            );
        }
    }
}
