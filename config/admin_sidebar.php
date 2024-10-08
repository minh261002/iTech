<?php

return [
    [
        'href' => 'sidebarNotification',
        'title' => 'Thông báo',
        'icon' => '<i data-feather="bell"></i>',
        'permissions' => ['viewNotification', 'createNotification', 'deleteNotification'],
        'sub_menu' => [
            [
                'title' => 'Thêm mới',
                'route' => 'admin.notification.create',
                'permissions' => ['createNotification'],
            ],
            [
                'title' => 'Danh sách',
                'route' => 'admin.notification.index',
                'permissions' => ['viewNotification'],
            ],
        ],
    ],
    [
        'href' => 'sidebarSlider',
        'title' => 'Sliders',
        'icon' => '<i data-feather="image"></i>',
        'permissions' => ['viewSlider', 'createSlider', 'editSlider', 'deleteSlider'],
        'sub_menu' => [
            [
                'title' => 'Thêm mới',
                'route' => 'admin.slider.create',
                'permissions' => ['createSlider'],
            ],
            [
                'title' => 'Danh sách',
                'route' => 'admin.slider.index',
                'permissions' => ['viewSlider'],
            ],
        ],
    ],
    [
        'href' => 'sidebarProduct',
        'title' => 'Sản phẩm',
        'icon' => '<i data-feather="shopping-bag"></i>',
        'permissions' => ['viewAttribute', 'createAttribute', 'editAttribute', 'deleteAttribute'],
        'sub_menu' => [
            [
                'title' => 'Thêm mới',
                'route' => 'admin.product.create',
                'permissions' => ['createAttribute'],
            ],
            [
                'title' => 'Danh sách',
                'route' => 'admin.product.index',
                'permissions' => ['viewAttribute'],
            ],
            [
                'title' => 'Các thuộc tính',
                'route' => 'admin.attribute.index',
                'permissions' => ['viewAttribute'],
            ],

        ],
    ],
    [
        'href' => 'sidebarCategory',
        'title' => 'Danh mục sản phẩm',
        'icon' => '<i data-feather="grid"></i>',
        'permissions' => ['viewCategory', 'createCategory', 'editCategory', 'deleteCategory'],
        'sub_menu' => [
            [
                'title' => 'Thêm mới',
                'route' => 'admin.category.create',
                'permissions' => ['createCategory'],
            ],
            [
                'title' => 'Danh sách',
                'route' => 'admin.category.index',
                'permissions' => ['viewCategory'],
            ],
        ],
    ],
    [
        'href' => 'sidebarDiscount',
        'title' => 'Mã giảm giá',
        'icon' => '<i data-feather="bookmark"></i>',
        'permissions' => ['viewDiscount', 'createDiscount', 'editDiscount', 'deleteDiscount'],
        'sub_menu' => [
            [
                'title' => 'Thêm mới',
                'route' => 'admin.discount.create',
                'permissions' => ['createDiscount'],
            ],
            [
                'title' => 'Danh sách',
                'route' => 'admin.discount.index',
                'permissions' => ['viewDiscount'],
            ],
        ],
    ],
    [
        'href' => 'sidebarOrder',
        'title' => 'Đơn hàng',
        'icon' => '<i data-feather="shopping-cart"></i>',
        'permissions' => ['viewOrder', 'editOrder', 'deleteOrder'],
        'sub_menu' => [
            [
                'title' => 'Thêm mới',
                'route' => 'admin.order.create',
                'permissions' => ['createOrder'],
            ],
            [
                'title' => 'Danh sách',
                'route' => 'admin.order.index',
                'permissions' => ['viewOrder'],
            ],
        ],
    ],
    [
        'href' => 'sidebarReview',
        'title' => 'Đánh giá',
        'icon' => '<i data-feather="star"></i>',
        'permissions' => ['viewDiscount', 'createDiscount', 'editDiscount', 'deleteDiscount'],
        'sub_menu' => [
            [
                'title' => 'Thêm mới',
                'route' => 'admin.discount.create',
                'permissions' => ['createDiscount'],
            ],
            [
                'title' => 'Danh sách',
                'route' => 'admin.discount.index',
                'permissions' => ['viewDiscount'],
            ],
        ],
    ],
    [
        'href' => 'sidebarPost',
        'title' => 'Bài viết',
        'icon' => '<i data-feather="file-text"></i>',
        'permissions' => ['viewPost', 'createPost', 'editPost', 'deletePost'],
        'sub_menu' => [
            [
                'title' => 'Thêm mới',
                'route' => 'admin.post.create',
                'permissions' => ['createPost'],
            ],
            [
                'title' => 'Danh sách',
                'route' => 'admin.post.index',
                'permissions' => ['viewPost'],
            ],
        ],
    ],
    [
        'href' => 'sidebarPostCatalogue',
        'title' => 'Chuyên mục bài viết',
        'icon' => '<i data-feather="book-open"></i>',
        'permissions' => ['viewPostCatalogue', 'createPostCatalogue', 'editPostCatalogue', 'deletePostCatalogue'],
        'sub_menu' => [
            [
                'title' => 'Thêm mới',
                'route' => 'admin.post.catalogue.create',
                'permissions' => ['createPostCatalogue'],
            ],
            [
                'title' => 'Danh sách',
                'route' => 'admin.post.catalogue.index',
                'permissions' => ['viewPostCatalogue'],
            ],
        ],
    ],
    [
        'href' => 'sidebarMember',
        'title' => 'Thành viên',
        'icon' => '<i data-feather="users"></i>',
        'permissions' => ['viewMember', 'createMember', 'editMember', 'deleteMember'],
        'sub_menu' => [
            [
                'title' => 'Thêm mới',
                'route' => 'admin.member.create',
                'permissions' => ['createMember'],
            ],
            [
                'title' => 'Danh sách',
                'route' => 'admin.member.index',
                'permissions' => ['viewMember'],
            ],
        ],
    ],
    [
        'href' => 'sidebarAdmin',
        'title' => 'Quản trị viên',
        'icon' => '<i data-feather="user-check"></i>',
        'role' => ['admin'],
        'permissions' => ['viewAdmin', 'createAdmin', 'editAdmin', 'deleteAdmin'],
        'sub_menu' => [
            [
                'title' => 'Thêm mới',
                'route' => 'admin.admin.create',
                'permissions' => ['createAdmin'],
            ],
            [
                'title' => 'Danh sách',
                'route' => 'admin.admin.index',
                'permission' => ['viewAdmin'],
            ],
        ],
    ],
    [
        'href' => 'sidebarSetting',
        'title' => 'Cài đặt',
        'icon' => '<i data-feather="settings"></i>',
        'permissions' => ['generalSetting', 'seoSetting'],
        'sub_menu' => [
            [
                'title' => 'Hệ thống',
                'route' => 'admin.setting.general',
                'permissions' => ['generalSetting'],
            ],
            [
                'title' => 'SEO',
                'route' => 'admin.setting.seo',
                'permissions' => ['generalSetting', 'seoSetting'],
            ],
        ],
    ],
    [
        'href' => 'sidebarRole',
        'title' => 'Vai trò',
        'icon' => '<i data-feather="clipboard"></i>',
        'permissions' => ['viewRole', 'createRole', 'editRole', 'deleteRole'],
        'sub_menu' => [
            [
                'title' => 'Thêm mới',
                'route' => 'admin.role.create',
                'permissions' => ['createRole'],
            ],
            [
                'title' => 'Danh sách',
                'route' => 'admin.role.index',
                'permissions' => ['viewRole'],
            ],
        ],
    ],
    [
        'href' => 'sidebarPermission',
        'title' => 'Dev: Quyền',
        'icon' => '<i data-feather="shield"></i>',
        'permissions' => ['viewPermission', 'createPermission', 'editPermission', 'deletePermission'],
        'sub_menu' => [
            [
                'title' => 'Thêm mới',
                'route' => 'admin.permission.create',
                'permissions' => ['createPermission'],
            ],
            [
                'title' => 'Danh sách',
                'route' => 'admin.permission.index',
                'permissions' => ['viewPermission'],
            ],
        ],
    ],
    [
        'href' => 'sidebarModule',
        'title' => 'Dev: Module',
        'icon' => '<i data-feather="package"></i>',
        'permissions' => ['viewModule', 'createModule', 'editModule', 'deleteModule'],
        'sub_menu' => [
            [
                'title' => 'Thêm mới',
                'route' => 'admin.module.create',
                'permissions' => ['createModule'],
            ],
            [
                'title' => 'Danh sách',
                'route' => 'admin.module.index',
                'permissions' => ['viewModule'],
            ],
        ],
    ]
];