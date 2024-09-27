<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class BindingProvider extends ServiceProvider
{
    protected $repositories = [
        '\App\Repositories\EloquentRepositoryInterface' => '\App\Repositories\EloquentRepository',
        'App\Repositories\Interfaces\ModuleRepositoryInterface' => 'App\Repositories\ModuleRepository',
        'App\Repositories\Interfaces\PermissionRepositoryInterface' => 'App\Repositories\PermissionRepository',
        'App\Repositories\Interfaces\RoleRepositoryInterface' => 'App\Repositories\RoleRepository',
        'App\Repositories\Interfaces\PostCatalogueRepositoryInterface' => 'App\Repositories\PostCatalogueRepository',
        'App\Repositories\Interfaces\PostRepositoryInterface' => 'App\Repositories\PostRepository',
        'App\Repositories\Interfaces\MemberRepositoryInterface' => 'App\Repositories\MemberRepository',
        'App\Repositories\Interfaces\CategoryRepositoryInterface' => 'App\Repositories\CategoryRepository',
        'App\Repositories\Interfaces\SliderRepositoryInterface' => 'App\Repositories\SliderRepository',
        'App\Repositories\Interfaces\SliderItemRepositoryInterface' => 'App\Repositories\SliderItemRepository',
        'App\Repositories\Interfaces\NotificationRepositoryInterface' => 'App\Repositories\NotificationRepository',
        'App\Repositories\Interfaces\AttributeRepositoryInterface' => 'App\Repositories\AttributeRepository',
        'App\Repositories\Interfaces\AttributeVariationRepositoryInterface' => 'App\Repositories\AttributeVariationRepository',
    ];

    protected $services = [
        'App\Services\Interfaces\ModuleServiceInterface' => 'App\Services\ModuleService',
        'App\Services\Interfaces\PermissionServiceInterface' => 'App\Services\PermissionService',
        'App\Services\Interfaces\RoleServiceInterface' => 'App\Services\RoleService',
        'App\Services\Interfaces\PostCatalogueServiceInterface' => 'App\Services\PostCatalogueService',
        'App\Services\Interfaces\PostServiceInterface' => 'App\Services\PostService',
        'App\Services\Interfaces\MemberServiceInterface' => 'App\Services\MemberService',
        'App\Services\Interfaces\CategoryServiceInterface' => 'App\Services\CategoryService',
        'App\Services\Interfaces\SliderServiceInterface' => 'App\Services\SliderService',
        'App\Services\Interfaces\SliderItemServiceInterface' => 'App\Services\SliderItemService',
        'App\Services\Interfaces\NotificationServiceInterface' => 'App\Services\NotificationService',
        'App\Services\Interfaces\AttributeServiceInterface' => 'App\Services\AttributeService',
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