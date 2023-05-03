<?php

namespace App\Listeners;

use App\Models\Plan;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

class PlanCreated
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
        Plan::create([
            'name' => $event->plan->name,
            'price' => $event->plan->amount / 100,
            'interval' => $event->plan->interval,
            'interval_count' => $event->plan->interval_count,
            'trial_period_days' => $event->plan->trial_days,
            'limit' => $event->plan->limit,
            'plan_id' => $event->plan->id
        ]);
    }
}
