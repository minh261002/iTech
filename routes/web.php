<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AttributeController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DiscountController;
use App\Http\Controllers\Admin\MemberController;
use App\Http\Controllers\Admin\ModuleController;
use App\Http\Controllers\Admin\NotificationController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\PostCatalogueController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\Product\ProductAttributeController;
use App\Http\Controllers\Admin\Product\ProductController;
use App\Http\Controllers\Admin\Product\ProductVariationController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Ajax\LocationController;
use App\Http\Controllers\User\HomeController;
use App\Http\Controllers\User\ProductController as UserProductController;
use App\Http\Controllers\User\AuthController as UserAuthController;
use Illuminate\Support\Facades\Route;

// ----------------- Route for Admin ----------------- //
Route::prefix('ajax')->group(function () {
    Route::get('/location', [LocationController::class, 'index']);
    //ajax notification
    Route::get('/admin/notification/get', [NotificationController::class, 'getMyNotification'])->name('notification.getMyNotification');
    Route::get('/admin/notification/show/{id}', [NotificationController::class, 'showNotification'])->name('notification.showNotification');
    Route::get('/admin/notification/readAll', [NotificationController::class, 'readAll'])->name('notification.readAll');
    Route::delete('/admin/notification/delete/{id}', [NotificationController::class, 'deleteNotification'])->name('notification.deleteNotification');
    Route::get('/admin/notification/deleteAll', [NotificationController::class, 'deleteAll'])->name('notification.deleteAll');
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

    Route::get('/my-notification', [NotificationController::class, 'myNotification'])->name('myNotification');

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
            Route::middleware(['permission:viewPermission'])->group(function () {
                Route::get('/', [PermissionController::class, 'index'])->name('permission.index');
            });

            Route::middleware(['permission:createPermission'])->group(function () {
                Route::get('/create', [PermissionController::class, 'create'])->name('permission.create');
                Route::post('/store', [PermissionController::class, 'store'])->name('permission.store');
            });

            Route::middleware(['permission:editPermission'])->group(function () {
                Route::get('/edit/{id}', [PermissionController::class, 'edit'])->name('permission.edit');
                Route::put('/update', [PermissionController::class, 'update'])->name('permission.update');
            });

            Route::middleware(['permission:deletePermission'])->group(function () {
                Route::delete('/delete/{id}', [PermissionController::class, 'delete'])->name('permission.delete');
            });
        });

        //quản lý vai trò
        Route::prefix('role')->group(function () {
            Route::middleware(['permission:viewRole'])->group(function () {
                Route::get('/', [RoleController::class, 'index'])->name('role.index');
            });

            Route::middleware(['permission:createRole'])->group(function () {
                Route::get('/create', [RoleController::class, 'create'])->name('role.create');
                Route::post('/store', [RoleController::class, 'store'])->name('role.store');
            });

            Route::middleware(['permission:editRole'])->group(function () {
                Route::get('/edit/{id}', [RoleController::class, 'edit'])->name('role.edit');
                Route::put('/update', [RoleController::class, 'update'])->name('role.update');
            });

            Route::middleware(['permission:deleteRole'])->group(function () {
                Route::delete('/delete/{id}', [RoleController::class, 'delete'])->name('role.delete');
            });
        });

        //quản lý admin
        Route::prefix('admin')->group(function () {
            Route::middleware(['permission:viewAdmin'])->group(function () {
                Route::get('/', [AdminController::class, 'index'])->name('admin.index');
            });

            Route::middleware(['permission:createAdmin'])->group(function () {
                Route::get('/create', [AdminController::class, 'create'])->name('admin.create');
                Route::post('/store', [AdminController::class, 'store'])->name('admin.store');
            });

            Route::middleware(['permission:editAdmin'])->group(function () {
                Route::get('/edit/{id}', [AdminController::class, 'edit'])->name('admin.edit');
                Route::put('/update/{id}', [AdminController::class, 'update'])->name('admin.update');
            });

            Route::middleware(['permission:deleteAdmin'])->group(function () {
                Route::delete('/delete/{id}', [AdminController::class, 'delete'])->name('admin.delete');
            });
        });

        //quản lý chuyên mục bài viết
        Route::prefix('post/catalogue')->group(function () {
            Route::middleware(['permission:viewPostCatalogue'])->group(function () {
                Route::get('/', [PostCatalogueController::class, 'index'])->name('post.catalogue.index');
                Route::get('/get', [PostCatalogueController::class, 'get'])->name('post.catalogue.get');
            });

            Route::middleware(['permission:createPostCatalogue'])->group(function () {
                Route::get('/create', [PostCatalogueController::class, 'create'])->name('post.catalogue.create');
                Route::post('/store', [PostCatalogueController::class, 'store'])->name('post.catalogue.store');
            });

            Route::middleware(['permission:editPostCatalogue'])->group(function () {
                Route::get('/edit/{id}', [PostCatalogueController::class, 'edit'])->name('post.catalogue.edit');
                Route::put('/update', [PostCatalogueController::class, 'update'])->name('post.catalogue.update');
                Route::get('/update/status', [PostCatalogueController::class, 'updateStatus'])->name('post.catalogue.update.status');
            });

            Route::middleware(['permission:deletePostCatalogue'])->group(function () {
                Route::delete('/delete/{id}', [PostCatalogueController::class, 'delete'])->name('post.catalogue.delete');
            });
        });

        //quản lý bài viết
        Route::prefix('post')->group(function () {
            Route::middleware(['permission:viewPost'])->group(function () {
                Route::get('/', [PostController::class, 'index'])->name('post.index');
            });

            Route::middleware(['permission:createPost'])->group(function () {
                Route::get('/create', [PostController::class, 'create'])->name('post.create');
                Route::post('/store', [PostController::class, 'store'])->name('post.store');
            });

            Route::middleware(['permission:editPost'])->group(function () {
                Route::get('/edit/{id}', [PostController::class, 'edit'])->name('post.edit');
                Route::put('/update', [PostController::class, 'update'])->name('post.update');
                Route::get('/update/status', [PostController::class, 'updateStatus'])->name('post.update.status');
            });

            Route::middleware(['permission:deletePost'])->group(function () {
                Route::delete('/delete/{id}', [PostController::class, 'delete'])->name('post.delete');
            });
        });

        //quản lý thành viên
        Route::prefix('member')->group(function () {
            Route::middleware(['permission:viewMember'])->group(function () {
                Route::get('/', [MemberController::class, 'index'])->name('member.index');
            });

            Route::middleware(['permission:createMember'])->group(function () {
                Route::get('/create', [MemberController::class, 'create'])->name('member.create');
                Route::post('/store', [MemberController::class, 'store'])->name('member.store');
            });

            Route::middleware(['permission:editMember'])->group(function () {
                Route::get('/edit/{id}', [MemberController::class, 'edit'])->name('member.edit');
                Route::put('/update', [MemberController::class, 'update'])->name('member.update');
                Route::get('/update/status', [MemberController::class, 'updateStatus'])->name('member.update.status');
            });

            Route::middleware(['permission:deleteMember'])->group(function () {
                Route::delete('/delete/{id}', [MemberController::class, 'delete'])->name('member.delete');
            });
        });

        //quản lý danh mục sản phẩm
        Route::prefix('category')->group(function () {
            Route::middleware(['permission:viewCategory'])->group(function () {
                Route::get('/', [CategoryController::class, 'index'])->name('category.index');
                Route::get('/get', [CategoryController::class, 'get'])->name('category.get');
            });

            Route::middleware(['permission:createCategory'])->group(function () {
                Route::get('/create', [CategoryController::class, 'create'])->name('category.create');
                Route::post('/store', [CategoryController::class, 'store'])->name('category.store');
            });

            Route::middleware(['permission:editCategory'])->group(function () {
                Route::get('/edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
                Route::put('/update', [CategoryController::class, 'update'])->name('category.update');
                Route::get('/update/status', [CategoryController::class, 'updateStatus'])->name('category.update.status');
            });

            Route::middleware(['permission:deleteCategory'])->group(function () {
                Route::delete('/delete/{id}', [CategoryController::class, 'delete'])->name('category.delete');
            });
        });

        //quản lý slider
        Route::prefix('slider')->group(function () {
            Route::middleware(['permission:viewSlider'])->group(function () {
                Route::get('/', [SliderController::class, 'index'])->name('slider.index');
            });

            Route::middleware(['permission:createSlider'])->group(function () {
                Route::get('/create', [SliderController::class, 'create'])->name('slider.create');
                Route::post('/store', [SliderController::class, 'store'])->name('slider.store');
            });

            Route::middleware(['permission:editSlider'])->group(function () {
                Route::get('/edit/{id}', [SliderController::class, 'edit'])->name('slider.edit');
                Route::put('/update', [SliderController::class, 'update'])->name('slider.update');
                Route::get('/update/status', [SliderController::class, 'updateStatus'])->name('slider.update.status');
            });

            Route::middleware(['permission:deleteSlider'])->group(function () {
                Route::delete('/delete/{id}', [SliderController::class, 'delete'])->name('slider.delete');
            });
        });

        //quản lý slider item
        Route::prefix('slider/{id}/item')->group(function () {
            Route::middleware(['permission:viewSliderItem'])->group(function () {
                Route::get('/', [SliderController::class, 'indexItem'])->name('slider.item.index');
            });

            Route::middleware(['permission:createSliderItem'])->group(function () {
                Route::get('/create', [SliderController::class, 'createItem'])->name('slider.item.create');
                Route::post('/store', [SliderController::class, 'storeItem'])->name('slider.item.store');
            });
        });

        Route::middleware(['permission:deleteSliderItem'])->group(function () {
            Route::delete('slider-item/delete/{id}', [SliderController::class, 'deleteItem'])->name('slider.item.delete');
        });

        Route::middleware(['permission:editSliderItem'])->group(function () {
            Route::get('slider-item/edit/{id}', [SliderController::class, 'editItem'])->name('slider.item.edit');
            Route::put('slider-item/update', [SliderController::class, 'updateItem'])->name('slider.item.update');
        });

        //quản lý thông báo
        Route::prefix('notification')->group(function () {
            Route::middleware(['permission:viewNotification'])->group(function () {
                Route::get('/', [NotificationController::class, 'index'])->name('notification.index');
            });

            Route::middleware(['permission:createNotification'])->group(function () {
                Route::get('/create', [NotificationController::class, 'create'])->name('notification.create');
                Route::post('/store', [NotificationController::class, 'store'])->name('notification.store');
            });

            Route::middleware(['permission:deleteNotification'])->group(function () {
                Route::delete('/delete/{id}', [NotificationController::class, 'delete'])->name('notification.delete');
            });
        });

        //quản lý thuộc tính sản phẩm
        Route::prefix('attribute')->group(function () {
            Route::middleware(['permission:viewAttribute'])->group(function () {
                Route::get('/', [AttributeController::class, 'index'])->name('attribute.index');
            });

            Route::middleware(['permission:createAttribute'])->group(function () {
                Route::get('/create', [AttributeController::class, 'create'])->name('attribute.create');
                Route::post('/store', [AttributeController::class, 'store'])->name('attribute.store');
            });

            Route::middleware(['permission:editAttribute'])->group(function () {
                Route::get('/edit/{id}', [AttributeController::class, 'edit'])->name('attribute.edit');
                Route::put('/update', [AttributeController::class, 'update'])->name('attribute.update');
            });

            Route::middleware(['permission:deleteAttribute'])->group(function () {
                Route::delete('/delete/{id}', [AttributeController::class, 'delete'])->name('attribute.delete');
            });

            Route::get('/get-variation', [AttributeController::class, 'getVariationByAttributeId']);
        });

        //quản lý các biến thể của thuộc tính sản phẩm
        Route::prefix('attribute/{id}/variation')->group(function () {
            Route::middleware(['permission:viewAttributeVariation'])->group(function () {
                Route::get('/', [AttributeController::class, 'variation'])->name('attribute.variation.index');
            });

            Route::middleware(['permission:createAttributeVariation'])->group(function () {
                Route::get('/create', [AttributeController::class, 'createVariation'])->name('attribute.variation.create');
                Route::post('/store', [AttributeController::class, 'storeVariation'])->name('attribute.variation.store');
            });
        });

        Route::middleware(['permission:deleteAttributeVariation'])->group(function () {
            Route::delete('attribute-variation/delete/{id}', [AttributeController::class, 'deleteVariation'])->name('attribute.variation.delete');
        });

        Route::middleware(['permission:editAttributeVariation'])->group(function () {
            Route::get('attribute-variation/edit/{id}', [AttributeController::class, 'editVariation'])->name('attribute.variation.edit');
            Route::put('attribute-variation/update', [AttributeController::class, 'updateVariation'])->name('attribute.variation.update');
        });

        //quản lý sản phẩm
        Route::prefix('product')->group(function () {
            Route::middleware(['permission:viewProduct'])->group(function () {
                Route::get('/', [ProductController::class, 'index'])->name('product.index');

                Route::prefix('attributes')->group(function () {
                    Route::get('/get', [ProductAttributeController::class, 'create'])->name('product.attributes.get');
                });

                Route::prefix('variations')->group(function () {
                    Route::get('/check', [ProductVariationController::class, 'check'])->name('product.variations.check');
                    Route::get('/create', [ProductVariationController::class, 'create'])->name('product.variations.create');
                    Route::get('/delete/{id}', [ProductVariationController::class, 'delete'])->name('product.variations.delete');
                });
            });

            Route::middleware(['permission:createProduct'])->group(function () {
                Route::get('/create', [ProductController::class, 'create'])->name('product.create');
                Route::post('/store', [ProductController::class, 'store'])->name('product.store');
            });

            Route::middleware(['permission:editProduct'])->group(function () {
                Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
                Route::put('/update', [ProductController::class, 'update'])->name('product.update');
                Route::get('/update/status', [ProductController::class, 'updateStatus'])->name('product.update.status');
            });

            Route::middleware(['permission:deleteProduct'])->group(function () {
                Route::delete('/delete/{id}', [ProductController::class, 'delete'])->name('product.delete');
            });
        });

        //quản lý mã giảm giá
        Route::prefix('discount')->group(function () {
            Route::middleware(['permission:viewDiscount'])->group(function () {
                Route::get('/', [DiscountController::class, 'index'])->name('discount.index');
            });

            Route::middleware(['permission:createDiscount'])->group(function () {
                Route::get('/create', [DiscountController::class, 'create'])->name('discount.create');
                Route::post('/store', [DiscountController::class, 'store'])->name('discount.store');
            });

            Route::middleware(['permission:editDiscount'])->group(function () {
                Route::get('/edit/{id}', [DiscountController::class, 'edit'])->name('discount.edit');
                Route::put('/update', [DiscountController::class, 'update'])->name('discount.update');
                Route::get('/update/status', [DiscountController::class, 'updateStatus'])->name('discount.update.status');
            });

            Route::middleware(['permission:deleteDiscount'])->group(function () {
                Route::delete('/delete/{id}', [DiscountController::class, 'delete'])->name('discount.delete');
            });
        });

        //quản lý đơn hàng
        Route::prefix('order')->group(function () {
            Route::middleware(['permission:viewOrder'])->group(function () {
                Route::get('/', [OrderController::class, 'index'])->name('order.index');
                Route::get('/userInfo', [OrderController::class, 'getUserInfo']);
                Route::get('/productInfo', [OrderController::class, 'getProductInfo']);
            });

            Route::middleware(['permission:createOrder'])->group(function () {
                Route::get('/create', [OrderController::class, 'create'])->name('order.create');
                Route::put('/store', [OrderController::class, 'store'])->name('order.store');
            });

            Route::middleware(['permission:editOrder'])->group(function () {
                Route::get('/edit/{id}', [OrderController::class, 'edit'])->name('order.edit');
                Route::put('/update', [OrderController::class, 'update'])->name('order.update');
            });
        });

        Route::prefix('setting')->group(function () {
            Route::middleware(['permission:generalSetting'])->group(function () {
                Route::get('/general', [SettingController::class, 'general'])->name('setting.general');
                Route::post('/general', [SettingController::class, 'updateGeneral'])->name('setting.general.update');
            });

            Route::middleware(['permission:seoSetting'])->group(function () {
                Route::get('/seo', [SettingController::class, 'seo'])->name('setting.seo');
                Route::post('/seo', [SettingController::class, 'updateSeo'])->name('setting.seo.update');
            });
        });
    });
});




Route::group(['as' => 'user.'], function () {
    //auth
    Route::get('/login', [UserAuthController::class, 'login'])->name('login');
    Route::post('/login', [UserAuthController::class, 'handleLogin'])->name('handleLogin');
    Route::get('/register', [UserAuthController::class, 'register'])->name('register');
    Route::post('/register', [UserAuthController::class, 'handleRegister'])->name('handleRegister');
    Route::get('/forgot-password', [UserAuthController::class, 'forgot_password'])->name('forgot-password');
    Route::post('/forgot-password', [UserAuthController::class, 'sendResetLinkEmail'])->name('sendResetLinkEmail');
    Route::get('/reset-password', [UserAuthController::class, 'reset_password'])->name('reset-password');
    Route::post('/reset-password', [UserAuthController::class, 'resetPassword'])->name('resetPassword');
    //socialite
    Route::get('/login/facebook', [UserAuthController::class, 'redirectToFacebook'])->name('login.facebook');
    Route::get('/login/facebook/callback', [UserAuthController::class, 'handleFacebookCallback']);
    Route::get('/login/google', [UserAuthController::class, 'redirectToGoogle'])->name('login.google');
    Route::get('/login/google/callback', [UserAuthController::class, 'handleGoogleCallback']);

    Route::get('/logout', [UserAuthController::class, 'logout'])->name('logout');

    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/products', [UserProductController::class, 'index'])->name('products');
    Route::get('/product-detail', [UserProductController::class, 'product_detail'])->name('product-detail');
    Route::get('/login', [UserAuthController::class, 'login'])->name('login');
    Route::get('/cart_0', [UserProductController::class, 'cart_0'])->name('cart');
    Route::get('/cart', [UserProductController::class, 'cart'])->name('cart');
    Route::get('/purchase', [UserProductController::class, 'purchase'])->name('purchase');
    Route::get('/payment', [UserProductController::class, 'payment'])->name('payment');
    Route::get('/successful-payment', [UserProductController::class, 'successful_payment'])->name('successful-payment');
});
