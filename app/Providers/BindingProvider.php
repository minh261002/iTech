<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class BindingProvider extends ServiceProvider
{
    protected $repositories = [
        '\App\Repositories\EloquentRepositoryInterface' => '\App\Repositories\EloquentRepository',
        'App\Repositories\Interfaces\ModuleRepositoryInterface' => 'App\Repositories\ModuleRepository',
        'App\Repositories\Interfaces\PermissionRepositoryInterface' => 'App\Repositories\PermissionRepository'
    ];

    protected $services = [
        'App\Services\Interfaces\ModuleServiceInterface' => 'App\Services\ModuleService',
        'App\Services\Interfaces\PermissionServiceInterface' => 'App\Services\PermissionService'
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