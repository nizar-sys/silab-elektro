<?php

$menuItems = [
    [
        'items' => [
            [
                'title' => 'Dashboard',
                'icon' => 'ri-home-smile-line',
                'route' => 'dashboard',
                'active' => 'dashboard',
                'submenu' => []
            ]
        ]
    ],
    [
        'header' => 'Manajemen Pengguna',
        'items' => [
            [
                'title' => 'Peran',
                'icon' => 'ri-lock-2-line',
                'route' => 'roles.index',
                'active' => 'roles.*',
                'submenu' => []
            ],
            [
                'title' => 'Pengguna',
                'icon' => 'ri-user-line',
                'route' => 'users.index',
                'active' => 'users.*',
                'submenu' => []
            ]
        ]
    ],
    [
        'header' => 'Master Data',
        'items' => [
            [
                'title' => 'Mata Kuliah',
                'icon' => 'ri-book-2-line',
                'route' => 'subjects.index',
                'active' => 'subjects.*',
                'submenu' => []
            ],
            [
                'title' => 'Siswa',
                'icon' => 'ri-user-3-line',
                'route' => 'students.index',
                'active' => 'students.*',
                'submenu' => []
            ]
        ]
    ],
    [
        'header' => 'Manajemen Ruangan',
        'items' => [
            [
                'title' => 'Data Ruangan',
                'icon' => 'ri-building-2-line',
                'route' => 'rooms.index',
                'active' => 'rooms.*',
                'submenu' => []
            ],
            [
                'title' => 'Data Inventaris',
                'icon' => 'ri-archive-line',
                'route' => 'inventories.index',
                'active' => 'inventories.*',
                'submenu' => [],
            ],
        ]
    ],
    [
        'header' => 'Manajemen Praktikum',
        'items' => [
            [
                'title' => 'Data Jadwal',
                'icon' => 'ri-calendar-todo-line',
                'route' => 'schedules.index',
                'active' => 'schedules.*',
                'submenu' => [],
            ],
            [
                'title' => 'Data Praktikum',
                'icon' => 'ri-book-3-line',
                'route' => 'practicals.index',
                'active' => 'practicals.*',
                'submenu' => [],
            ]
        ]
    ],
    [
        'header' => 'Pengaturan',
        'items' => [
            [
                'title' => 'Profil',
                'icon' => 'ri-settings-4-line',
                'route' => 'profile.edit',
                'active' => 'profile.*',
                'submenu' => []
            ]
        ]
    ]
];

return $menuItems;
