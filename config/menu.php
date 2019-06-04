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
|         'parameters' => [], (Route's parameters. This is optional.)
|         'menuText'   => '', (Reference translation string)
|         'class'      => '', (Use class attribute as a class which has authorization policy; if skip this attribute, it means that the menu always show this menu choice. )
|         'gate'       => '', (Use gate attribute as an authorization method. Default is 'view' method. )
|     ],
| ],
|
*/

return [
    'mainMenu' => [
        [
            'routeName' => 'home.index',
            'menuText'  => 'home.page_link.index',
        ],
        [
            'routeName' => 'learn.index',
            'menuText'  => 'learn.page_link.index',
        ],
        [
            'routeName' => '#',
            'menuText'  => 'share.page_link.index',
        ],
        [
            'routeName' => '#',
            'menuText'  => 'give.page_link.index',
        ],
        [
            'routeName' => '#',
            'menuText'  => 'events.page_link.index',
        ],
        [
            'routeName' => '#',
            'menuText'  => 'news.page_link.index',
        ],
        [
            'routeName' => '#',
            'menuText'  => 'organization.page_link.index',
        ],
    ],

    'mainMenuAdmin' => [
        [
            'routeName' => 'admin.home.index',
            'menuText'  => 'home.page_link.index',
        ],
        [
            'routeName' => 'admin.user.index',
            'menuText'  => 'user.page_link.index',
        ],
    ],
];
