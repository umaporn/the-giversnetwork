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
            'routeName' => 'share.index',
            'menuText'  => 'share.page_link.index',
        ],
        [
            'routeName' => 'give.index',
            'menuText'  => 'give.page_link.index',
        ],
        [
            'routeName' => 'events.index',
            'menuText'  => 'events.page_link.index',
        ],
        /*[
            'routeName' => 'news.index',
            'menuText'  => 'news.page_link.index',
        ],*/
        [
            'routeName' => 'organization.index',
            'menuText'  => 'organization.page_link.index',
        ],
    ],

    'mainMenuAdmin' => [
        /*[
            'routeName'  => '#',
            'menuText'   => 'user_admin.page_link.my_profile',
            'childMenu'  => [
                [
                    'routeName'  => 'admin.editProfile',
                    'menuText'   => 'user.page_link.edit',
                    'icon'       => 'fas fa-caret-right',
                ],
            ],
        ],*/
        [
            'routeName'  => '#',
            'menuText'   => 'learn_admin.page_link.index',
            'childMenu'  => [
                [
                    'routeName'  => 'admin.learnAll',
                    'menuText'   => 'learn_admin.page_link.all',
                    'icon'       => 'fas fa-caret-right',
                ],
                [
                    'routeName'  => 'admin.learnAdd',
                    'menuText'   => 'learn_admin.page_link.add',
                    'icon'       => 'fas fa-caret-right',
                ],
            ],
        ],
        [
            'routeName'  => '#',
            'menuText'   => 'user_admin.page_link.index',
            'childMenu'  => [
                [
                    'routeName'  => 'admin.user.index',
                    'menuText'   => 'user_admin.page_link.all_user',
                    'icon'       => 'fas fa-caret-right',
                ],
            ],
        ],

    ],
];
