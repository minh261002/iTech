<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class BindingProvider extends ServiceProvider
{
    protected $repositories = [
        '\App\Repositories\EloquentRepositoryInterface' => '\App\Repositories\EloquentRepository',
        'App\Repositories\interfaces\ModuleRepositoryInterface' => 'App\Repositories\ModuleRepository'
    ];

    protected $services = [
        'App\Services\Interfaces\ModuleServiceInterface' => 'App\Services\ModuleService'
    ];
    /**
     * Register services.
     */
    public function register(): void
    {
        foreach ($this->repositories as $interface => $implement) {
            $this->app->singleton($interface, $implement);
        }

        foreach ($this->services as $interface => $implement) {
            $this->app->singleton($interface, $implement);
        }
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}