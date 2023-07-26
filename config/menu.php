<?php


return [
    // Dashboard

    [
        'path' => 'admin/dashboard',
        'active' => 'admin/dashboard',
        'permission' => 'dashboard-view',
        'name' => [
            'en' => 'Dashboard',
            'kh' => 'ទំព័រដើម',
        ],
        'icon' => 'fa-house',
    ],


    [
        'path' => 'admin/dashboard',
        'active' => 'admin/user/lists,admin/user/role,admin/user/permission/*,admin/user/create,admin/user/edit/*',
        'permission' => ['user-view', 'stock-out-view'],
        'name' => [
            'en' => 'User Management',
            'kh' => 'គ្រប់គ្រងអ្នកប្រើប្រាស់',
        ],
        'icon' => 'fa-users',
        'children' => [
            [
                'path' => 'admin/user/lists',
                'active' => 'admin/user/lists,admin/user/permission/*,admin/user/create,admin/user/edit/*',
                // 'permission' => 'stock-in-view',
                'name' => [
                    'en' => 'User Lists',
                    'kh' => 'ប្រវត្តិរូបអ្នកប្រើប្រាស់',
                ],
            ],
            [
                'path' => 'admin/user/role',
                'active' => 'admin/user/role',
                // 'permission' => 'stock-in-view',
                'name' => [
                    'en' => 'Role Role',
                    'kh' => 'តួនាទីអ្នកប្រើប្រាស់',
                ],
            ],
        ],
    ],


    [
        'path' => 'admin/dashboard',
        'active' => 'admin/user/list',
        'permission' => ['user-view', 'stock-out-view'],
        'name' => [
            'en' => 'User ',
            'kh' => 'គ្រប់គ្រងអ្នកប្រើប្រាស់',
        ],
        'icon' => 'fa-users',
        'children' => [
            [
                'path' => 'admin/user/lists',
                'active' => 'admin/user/lists,admin/user/permission/*,admin/user/create,admin/user/edit/*',
                // 'permission' => 'stock-in-view',
                'name' => [
                    'en' => 'User Lists',
                    'kh' => 'ប្រវត្តិរូបអ្នកប្រើប្រាស់',
                ],
            ],
            [
                'path' => 'admin/user/role',
                'active' => 'admin/user/role',
                // 'permission' => 'stock-in-view',
                'name' => [
                    'en' => 'Role Role',
                    'kh' => 'តួនាទីអ្នកប្រើប្រាស់',
                ],
            ],
        ],
    ],




];

