<?php

namespace App\Providers;

use Barryvdh\Debugbar\Facades\Debugbar;
use Illuminate\Support\ServiceProvider;
// use Barryvdh\Debugbar\Facades\Debugbar;

class AppServiceProvider extends ServiceProvider {
    /**
     * Register any application services.
     */
    public function register(): void {
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void {
        //
        Debugbar::disable();
    }
}
