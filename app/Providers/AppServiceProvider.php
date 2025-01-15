<?php

namespace App\Providers;

use App\Auth\Providers\CachedEloquentUserProvider;
use Illuminate\Auth\EloquentUserProvider;
use Illuminate\Foundation\Application;
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
        auth()->provider('cachedEloquent', function (Application $application, array $config) {
            return new CachedEloquentUserProvider(
                $application['hash'],
                $config['model']
            );
        });
    }
}
