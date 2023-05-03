<?php

namespace App\Providers;

use App\Events\BuyMoney;
use App\Events\PlanCreated;
use App\Events\SubsCreated;
use App\Listeners\BuyMoney as ListenersBuyMoney;
use App\Listeners\PlanCreated as ListenersPlanCreated;
use App\Listeners\SubsCreated as ListenersSubsCreated;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        PlanCreated::class => [
            ListenersPlanCreated::class,
        ],

        BuyMoney::class => [
            ListenersBuyMoney::class,
        ],

        SubsCreated::class => [
            ListenersSubsCreated::class,
        ]
    ];

    /**
     * Register any events for your application.
     */
    public function boot(): void
    {
        //
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     */
    public function shouldDiscoverEvents(): bool
    {
        return false;
    }
}
