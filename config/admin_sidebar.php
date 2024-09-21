<?php

return [
    [
        'href' => 'sidebarAdmin',
        'title' => 'Quản trị viên',
        'icon' => '<i data-feather="user-check"></i>',
        'role' => ['admin'],
        'permission' => ['viewAdmin', 'createAdmin', 'editAdmin', 'deleteAdmin'],
        'sub_menu' => [
            [
                'title' => 'Thêm mới',
                'route' => 'admin.admin.create',
                'permission' => 'createAdmin',
            ],
            [
                'title' => 'Danh sách',
                'route' => 'admin.admin.index',
                'permission' => 'viewAdmin',
            ],
        ],
    ],
    [
        'href' => 'sidebarRole',
        'title' => 'Vai trò',
        'icon' => '<i data-feather="clipboard"></i>',
        'sub_menu' => [
            [
                'title' => 'Thêm mới',
                'route' => 'admin.role.create',
            ],
            [
                'title' => 'Danh sách',
                'route' => 'admin.role.index',
            ],
        ],
    ],
    [
        'href' => 'sidebarPermission',
        'title' => 'Dev: Quyền',
        'icon' => '<i data-feather="shield"></i>',
        'sub_menu' => [
            [
                'title' => 'Thêm mới',
                'route' => 'admin.permission.create',
            ],
            [
                'title' => 'Danh sách',
                'route' => 'admin.permission.index',
            ],
        ],
    ],
    [
        'href' => 'sidebarModule',
        'title' => 'Dev: Module',
        'icon' => '<i data-feather="package"></i>',
        'sub_menu' => [
            [
                'title' => 'Thêm mới',
                'route' => 'admin.module.create',
            ],
            [
                'title' => 'Danh sách',
                'route' => 'admin.module.index',
            ],
        ],
    ]
];