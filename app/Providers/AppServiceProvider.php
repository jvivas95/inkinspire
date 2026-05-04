<?php

namespace App\Providers;

use App\Models\Review;
use Illuminate\Support\ServiceProvider;
use App\Observers\ReviewObserver;

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
        Review::observe(ReviewObserver::class);
    }
}
