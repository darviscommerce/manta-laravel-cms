<?php

namespace Manta\LaravelCms\Providers;

use Manta\LaravelCms\Console\InstallMantaLaravelCms;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;

class MantaCmsProvider extends ServiceProvider
{
    /**
     * Bootstrap any package services.
     *
     * @return void
     */
    public function boot()
    {
        // * Laravel components

        // * Migrations
        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');

        // * Artisan commands
        if ($this->app->runningInConsole()) {
            $this->commands([
                InstallMantaLaravelCms::class,
            ]);
        }
    }
}
