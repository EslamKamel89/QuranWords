<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
// use Barryvdh\Debugbar\Facades\Debugbar;

class AppServiceProvider extends ServiceProvider {
    /**
     * Register any application services.
     */
    public function register(): void {
        // Debugbar::disable();
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void {
        //
    }
}
