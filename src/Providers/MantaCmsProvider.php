<?php

namespace Manta\LaravelCms\Providers;

use Manta\LaravelCms\Console\InstallMantaLaravelCms;
use Manta\LaravelCms\Http\Livewire\Users\UsersCreate;
use Manta\LaravelCms\Http\Livewire\Users\UsersList;
use Manta\LaravelCms\Http\Livewire\Users\UsersUpdate;
use Manta\LaravelCms\View\Components\Manta\ComponentTinymce;

// use Manta\LaravelCms\Http\Livewire\Users\UsersList;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
use Livewire\Livewire;
use Illuminate\Support\Facades\Blade;
// use Livewire\Livewire;

class MantaCmsProvider extends ServiceProvider
{


    /**
     * Bootstrap any package services.
     *
     * @return void
     */
    public function boot()
    {

        // * Routes
        $this->registerRoutes();

        // * Laravel components
        Livewire::component('users-create', UsersCreate::class);
        Livewire::component('users-update', UsersUpdate::class);
        Livewire::component('users-list', UsersList::class);

        Blade::component('component-tinymce', ComponentTinymce::class);



        // * Views
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'manta-laravel-users');

        // * Migrations
        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');

        $this->loadViewComponentsAs('manta-laravel-users', [
            MantaFooter::class,
        ]);

        // * Artisan commands
        if ($this->app->runningInConsole()) {
            $this->commands([
                InstallMantaLaravelCms::class,
            ]);
        }

        // * Publish options
        if ($this->app->runningInConsole()) {
            // Publish view components
            $this->publishes([
                __DIR__ . '/../public/libs/' => public_path('libs'),
                __DIR__ . '/../public/images/' => public_path('images'),
                // __DIR__ . '/../View/Components/' => app_path('View/Components'),
                // __DIR__ . '/../Traits/' => app_path('Traits'),
                __DIR__ . '/../resources/' => resource_path(''),
                // __DIR__ . '/../resources/views/' => resource_path('views'),
                // __DIR__ . '/../resources/views/layouts/' => resource_path('views/layouts'),
                // __DIR__ . '/../resources/views/components/' => resource_path('views/components'),
                // __DIR__ . '/../database/seeders/' => resource_path('/../database/seeders'),
            ], 'view-components');


            $this->publishes([
              __DIR__.'/../config/config.php' => config_path('manta-cms.php'),
            ], 'config');

          }
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/config.php', 'manta-cms');
    }

    protected function registerRoutes()
    {
        Route::group($this->routeConfiguration(), function () {
            $this->loadRoutesFrom(__DIR__.'/../routes/web.php');
        });
    }

    protected function routeConfiguration()
    {
        // dd(config('manta-cms.prefix'));
        return [
            'prefix' => config('manta-cms.prefix'),
            'middleware' => config('manta-cms.middleware'),
        ];
    }
}