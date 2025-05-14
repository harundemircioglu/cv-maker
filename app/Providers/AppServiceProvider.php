<?php

namespace App\Providers;

use App\Models\Resume;
use App\Observers\ResumeObserver;
use Illuminate\Support\ServiceProvider;

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
        Resume::observe(ResumeObserver::class);
    }
}
