<?php

/*
|--------------------------------------------------------------------------
| Menu items
|--------------------------------------------------------------------------
|
| Example for child menus:
| 'childMenu' => [
|     [
|         'routeName'  => '',
|         'menuText'   => '', (Reference translation string)
|         'class'      => '', (Use class attribute for authorization; if skip this attribute, it means that the menu always show this menu choice )
|     ],
| ],
|
*/

return [
    'mainMenu' => [
        [
            'routeName' => 'home.index',
            'menuText'  => 'home.page_link.index',
            'class'     => 'App\Http\Controllers\HomeController',
        ],
        [
            'routeName' => 'menu.index',
            'menuText'  => 'menu.page_link.index',
            'childMenu' => [
                [
                    'routeName' => 'menu.index',
                    'menuText'  => 'menu.page_link.index_en',
                ],
                [
                    'routeName' => 'menu.index',
                    'menuText'  => 'menu.page_link.index_th',
                ],
            ],
        ],
    ],
];
