<?php

namespace App\Providers;

use App\Models\Review;
use App\Models\User;
use App\Policies\ReviewPolicy;
use App\Policies\UserPolicy;

use Illuminate\Support\ServiceProvider;
use App\Observers\ReviewObserver;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\URL;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
        if (config('app.env') === 'production')
        {
            URL::forceScheme('https');
        }

        Review::observe(ReviewObserver::class);
        Gate::policy(User::class, UserPolicy::class);
        Gate::policy(Review::class, ReviewPolicy::class);
    }
}
