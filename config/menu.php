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
            'routeName' => 'content.list',
            'menuText'  => 'content.page_link.list',
            'class'     => 'App\Http\Controllers\ContentController',
        ],
        [
            'routeName' => 'content.show',
            'menuText'  => 'content.page_link.show',
            'class'     => 'App\Http\Controllers\ContentController',
        ],
    ],
];
