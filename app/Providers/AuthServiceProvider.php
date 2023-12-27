<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\Chapter;
use App\Models\Comic;
use App\Models\Post;
use App\Models\User;
use App\Policies\ChapterPolicy;
use App\Policies\ComicPolicy;
use App\Policies\PostPolicy;
use App\Policies\UserPolicy;
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
        Chapter::class => ChapterPolicy::class,
        User::class => UserPolicy::class,
        Post::class => PostPolicy::class,
        
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        //
    }
}
