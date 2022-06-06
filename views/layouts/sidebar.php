<?php
use app\widgets\SidebarMenu;
?>

<nav id="sidebar" class="bg-light">
    <div class="sidebar-header p-2 bg-gradient text-white d-flex align-items-center shadow-sm">
        <h3 class="mb-0"><?= getenv('APPNAME') ?></h3>
    </div>

    <?= SidebarMenu::widget([
        'links' => [
            [
                'label' => 'Dashboard',
                'url' => '/',
                'icon' => 'th-large'
            ],
            'Category 1' => [
                [
                    'label' => 'Dropwdown 1',
                    'icon' => 'box',
                    'items' => [
                        [
                            'label' => 'Submenu 1',
                            'url' => '#'
                        ],
                        [
                            'label' => 'Submenu 2',
                            'url' => '#'
                        ]
                    ]
                ],
                [
                    'label' => 'Dropdown 2',
                    'icon' => 'barcode',
                    'items' => [
                        [
                            'label' => 'Submenu 1',
                            'url' => '#'
                        ],
                        [
                            'label' => 'Submenu 2',
                            'url' => '#'
                        ]
                    ]
                ],
            ],
            'Category 2' => [
                [
                    'label' => 'Dropdown 3',
                    'icon' => 'users-cog',
                    'items' => [
                        [
                            'label' => 'Submenu 1',
                            'url' => '#'
                        ],
                        [
                            'label' => 'Submenu 2',
                            'url' => '#'
                        ]
                    ]
                ],
                [
                    'label' => 'Item',
                    'icon' => 'user-clock',
                    'url' => '#'
                ],
            ],
            [
                'label' => 'Settings',
                'icon' => 'cog',
                'url' => '#'
            ],
        ]
    ]); ?>
</nav>
