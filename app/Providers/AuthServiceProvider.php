<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\Chapter;
use App\Models\Comic;
use App\Policies\ComicPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
        Comic::class => ComicPolicy::class,
        Chapter::class => ComicPolicy::class,
        
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        //
    }
}
