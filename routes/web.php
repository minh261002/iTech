<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\MemberController;
use App\Http\Controllers\Admin\ModuleController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\PostCatalogueController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\SliderController;
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
                Route::get('/update/status', [PostCatalogueController::class, 'updateStatus'])->name('post.catalogue.update.status');
            });

            Route::middleware(['permission:deletePostCatalogue', 'auth:admin'])->group(function () {
                Route::delete('/delete/{id}', [PostCatalogueController::class, 'delete'])->name('post.catalogue.delete');
            });
        });

        //quản lý bài viết
        Route::prefix('post')->group(function () {
            Route::middleware(['permission:viewPost', 'auth:admin'])->group(function () {
                Route::get('/', [PostController::class, 'index'])->name('post.index');
            });

            Route::middleware(['permission:createPost', 'auth:admin'])->group(function () {
                Route::get('/create', [PostController::class, 'create'])->name('post.create');
                Route::post('/store', [PostController::class, 'store'])->name('post.store');
            });

            Route::middleware(['permission:editPost', 'auth:admin'])->group(function () {
                Route::get('/edit/{id}', [PostController::class, 'edit'])->name('post.edit');
                Route::put('/update', [PostController::class, 'update'])->name('post.update');
                Route::get('/update/status', [PostController::class, 'updateStatus'])->name('post.update.status');
            });

            Route::middleware(['permission:deletePost', 'auth:admin'])->group(function () {
                Route::delete('/delete/{id}', [PostController::class, 'delete'])->name('post.delete');
            });
        });

        //quản lý thành viên
        Route::prefix('member')->group(function () {
            Route::middleware(['permission:viewMember', 'auth:admin'])->group(function () {
                Route::get('/', [MemberController::class, 'index'])->name('member.index');
            });

            Route::middleware(['permission:createMember', 'auth:admin'])->group(function () {
                Route::get('/create', [MemberController::class, 'create'])->name('member.create');
                Route::post('/store', [MemberController::class, 'store'])->name('member.store');
            });

            Route::middleware(['permission:editMember', 'auth:admin'])->group(function () {
                Route::get('/edit/{id}', [MemberController::class, 'edit'])->name('member.edit');
                Route::put('/update', [MemberController::class, 'update'])->name('member.update');
                Route::get('/update/status', [MemberController::class, 'updateStatus'])->name('member.update.status');
            });

            Route::middleware(['permission:deleteMember', 'auth:admin'])->group(function () {
                Route::delete('/delete/{id}', [MemberController::class, 'delete'])->name('member.delete');
            });
        });

        //quản lý danh mục sản phẩm
        Route::prefix('category')->group(function () {
            Route::middleware(['permission:viewCategory', 'auth:admin'])->group(function () {
                Route::get('/', [CategoryController::class, 'index'])->name('category.index');
            });

            Route::middleware(['permission:createCategory', 'auth:admin'])->group(function () {
                Route::get('/create', [CategoryController::class, 'create'])->name('category.create');
                Route::post('/store', [CategoryController::class, 'store'])->name('category.store');
            });

            Route::middleware(['permission:editCategory', 'auth:admin'])->group(function () {
                Route::get('/edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
                Route::put('/update', [CategoryController::class, 'update'])->name('category.update');
                Route::get('/update/status', [CategoryController::class, 'updateStatus'])->name('category.update.status');
            });

            Route::middleware(['permission:deleteCategory', 'auth:admin'])->group(function () {
                Route::delete('/delete/{id}', [CategoryController::class, 'delete'])->name('category.delete');
            });
        });

        //quản lý slider
        Route::prefix('slider')->group(function () {
            Route::middleware(['permission:viewSlider', 'auth:admin'])->group(function () {
                Route::get('/', [SliderController::class, 'index'])->name('slider.index');
            });

            Route::middleware(['permission:createSlider', 'auth:admin'])->group(function () {
                Route::get('/create', [SliderController::class, 'create'])->name('slider.create');
                Route::post('/store', [SliderController::class, 'store'])->name('slider.store');
            });

            Route::middleware(['permission:editSlider', 'auth:admin'])->group(function () {
                Route::get('/edit/{id}', [SliderController::class, 'edit'])->name('slider.edit');
                Route::put('/update', [SliderController::class, 'update'])->name('slider.update');
                Route::get('/update/status', [SliderController::class, 'updateStatus'])->name('slider.update.status');
            });

            Route::middleware(['permission:deleteSlider', 'auth:admin'])->group(function () {
                Route::delete('/delete/{id}', [SliderController::class, 'delete'])->name('slider.delete');
            });
        });

        //quản lý slider item
        Route::prefix('slider/{id}/item')->group(function () {
            Route::middleware(['permission:viewSliderItem', 'auth:admin'])->group(function () {
                Route::get('/', [SliderController::class, 'indexItem'])->name('slider.item.index');
            });

            Route::middleware(['permission:createSliderItem', 'auth:admin'])->group(function () {
                Route::get('/create', [SliderController::class, 'createItem'])->name('slider.item.create');
                Route::post('/store', [SliderController::class, 'storeItem'])->name('slider.item.store');
            });
        });

        Route::middleware(['permission:deleteSliderItem', 'auth:admin'])->group(function () {
            Route::delete('slider-item/delete/{id}', [SliderController::class, 'deleteItem'])->name('slider.item.delete');
        });

        Route::middleware(['permission:editSliderItem', 'auth:admin'])->group(function () {
            Route::get('slider-item/edit/{id}', [SliderController::class, 'editItem'])->name('slider.item.edit');
            Route::put('slider-item/update', [SliderController::class, 'updateItem'])->name('slider.item.update');
        });
    });
});