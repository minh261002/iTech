<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ModuleController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\PostCatalogueController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Ajax\LocationController;
use Illuminate\Support\Facades\Route;

Route::prefix('ajax')->group(function () {
    Route::get('/location', [LocationController::class, 'index']);
});

Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    //auth
    Route::middleware(['admin.login'])->group(function () {
        Route::get('/login', [AuthController::class, 'login'])->name('login');
        Route::post('/login', [AuthController::class, 'authenticate'])->name('authenticate');

        Route::get('/forgot-password', [AuthController::class, 'forgotPassword'])->name('password.request');
        Route::post('/forgot-password', [AuthController::class, 'sendResetLinkEmail'])->name('password.email');

        Route::get('/reset-password', [AuthController::class, 'resetPassword'])->name('password.reset');
        Route::post('/reset-password', [AuthController::class, 'updatePassword'])->name('password.update');
    });

    Route::middleware(['admin.auth'])->group(function () {
        //dashboard
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
        Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

        //quản lý module
        Route::prefix('module')->group(function () {
            Route::get('/', [ModuleController::class, 'index'])->name('module.index');
            Route::get('/create', [ModuleController::class, 'create'])->name('module.create');
            Route::post('/store', [ModuleController::class, 'store'])->name('module.store');
            Route::get('/edit/{id}', [ModuleController::class, 'edit'])->name('module.edit');
            Route::put('/update', [ModuleController::class, 'update'])->name('module.update');
            Route::delete('/delete/{id}', [ModuleController::class, 'delete'])->name('module.delete');
        });

        //quản lý quyền
        Route::prefix('permission')->group(function () {
            Route::middleware(['permission:viewPermission', 'auth:admin'])->group(function () {
                Route::get('/', [PermissionController::class, 'index'])->name('permission.index');
            });

            Route::middleware(['permission:createPermission', 'auth:admin'])->group(function () {
                Route::get('/create', [PermissionController::class, 'create'])->name('permission.create');
                Route::post('/store', [PermissionController::class, 'store'])->name('permission.store');
            });

            Route::middleware(['permission:editPermission', 'auth:admin'])->group(function () {
                Route::get('/edit/{id}', [PermissionController::class, 'edit'])->name('permission.edit');
                Route::put('/update', [PermissionController::class, 'update'])->name('permission.update');
            });

            Route::middleware(['permission:deletePermission', 'auth:admin'])->group(function () {
                Route::delete('/delete/{id}', [PermissionController::class, 'delete'])->name('permission.delete');
            });
        });

        //quản lý vai trò
        Route::prefix('role')->group(function () {
            Route::middleware(['permission:viewRole', 'auth:admin'])->group(function () {
                Route::get('/', [RoleController::class, 'index'])->name('role.index');
            });

            Route::middleware(['permission:createRole', 'auth:admin'])->group(function () {
                Route::get('/create', [RoleController::class, 'create'])->name('role.create');
                Route::post('/store', [RoleController::class, 'store'])->name('role.store');
            });

            Route::middleware(['permission:editRole', 'auth:admin'])->group(function () {
                Route::get('/edit/{id}', [RoleController::class, 'edit'])->name('role.edit');
                Route::put('/update', [RoleController::class, 'update'])->name('role.update');
            });

            Route::middleware(['permission:deleteRole', 'auth:admin'])->group(function () {
                Route::delete('/delete/{id}', [RoleController::class, 'delete'])->name('role.delete');
            });
        });

        //quản lý admin
        Route::prefix('admin')->group(function () {
            Route::middleware(['permission:viewAdmin', 'auth:admin'])->group(function () {
                Route::get('/', [AdminController::class, 'index'])->name('admin.index');
            });

            Route::middleware(['permission:createAdmin', 'auth:admin'])->group(function () {
                Route::get('/create', [AdminController::class, 'create'])->name('admin.create');
                Route::post('/store', [AdminController::class, 'store'])->name('admin.store');
            });

            Route::middleware(['permission:editAdmin', 'auth:admin'])->group(function () {
                Route::get('/edit/{id}', [AdminController::class, 'edit'])->name('admin.edit');
                Route::put('/update/{id}', [AdminController::class, 'update'])->name('admin.update');
            });

            Route::middleware(['permission:deleteAdmin', 'auth:admin'])->group(function () {
                Route::delete('/delete/{id}', [AdminController::class, 'delete'])->name('admin.delete');
            });
        });

        //quản lý chuyên mục bài viết
        Route::prefix('post/catalogue')->group(function () {
            Route::middleware(['permission:viewPostCatalogue', 'auth:admin'])->group(function () {
                Route::get('/', [PostCatalogueController::class, 'index'])->name('post.catalogue.index');
            });

            Route::middleware(['permission:createPostCatalogue', 'auth:admin'])->group(function () {
                Route::get('/create', [PostCatalogueController::class, 'create'])->name('post.catalogue.create');
                Route::post('/store', [PostCatalogueController::class, 'store'])->name('post.catalogue.store');
            });

            Route::middleware(['permission:editPostCatalogue', 'auth:admin'])->group(function () {
                Route::get('/edit/{id}', [PostCatalogueController::class, 'edit'])->name('post.catalogue.edit');
                Route::put('/update', [PostCatalogueController::class, 'update'])->name('post.catalogue.update');
            });

            Route::middleware(['permission:deletePostCatalogue', 'auth:admin'])->group(function () {
                Route::delete('/delete/{id}', [PostCatalogueController::class, 'delete'])->name('post.catalogue.delete');
            });
        });
    });
});