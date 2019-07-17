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
            'routeName' => '#',
            'menuText'  => 'learn_admin.page_link.index',
            'name'      => 'learn',
            'childMenu' => [
                [
                    'routeName' => 'admin.learn.index',
                    'menuText'  => 'learn_admin.page_link.all',
                    'icon'      => 'fas fa-caret-right',
                    'name'      => 'learn',
                ],
                [
                    'routeName' => 'admin.learn.create',
                    'menuText'  => 'learn_admin.page_link.add',
                    'icon'      => 'fas fa-caret-right',
                    'name'      => 'learn',
                ],
            ],
        ],
        [
            'routeName' => '#',
            'menuText'  => 'give_admin.page_link.index',
            'name'      => 'give',
            'childMenu' => [
                [
                    'routeName' => 'admin.give.index',
                    'menuText'  => 'give_admin.page_link.all',
                    'icon'      => 'fas fa-caret-right',
                    'name'      => 'give',
                ],
                [
                    'routeName' => 'admin.receive.index',
                    'menuText'  => 'give_admin.page_link.receive_all',
                    'icon'      => 'fas fa-caret-right',
                    'name'      => 'give',
                ],
                [
                    'routeName' => 'admin.give.create',
                    'menuText'  => 'give_admin.page_link.add',
                    'icon'      => 'fas fa-caret-right',
                    'name'      => 'give',
                ],
            ],
        ],
        [
            'routeName' => '#',
            'menuText'  => 'share_admin.page_link.index',
            'name'      => 'share',
            'childMenu' => [
                [
                    'routeName' => 'admin.share.index',
                    'menuText'  => 'share_admin.page_link.share_all',
                    'icon'      => 'fas fa-caret-right',
                    'name'      => 'share',
                ],
                [
                    'routeName' => 'admin.share.create',
                    'menuText'  => 'share_admin.page_link.share_add',
                    'icon'      => 'fas fa-caret-right',
                    'name'      => 'share',
                ],
                [
                    'routeName' => 'admin.challenge.index',
                    'menuText'  => 'share_admin.page_link.challenge_all',
                    'icon'      => 'fas fa-caret-right',
                    'name'      => 'share',
                ],
                [
                    'routeName' => 'admin.challenge.create',
                    'menuText'  => 'share_admin.page_link.challenge_add',
                    'icon'      => 'fas fa-caret-right',
                    'name'      => 'share',
                ],
            ],
        ],
        [
            'routeName' => '#',
            'menuText'  => 'user_admin.page_link.index',
            'name'      => 'user',
            'childMenu' => [
                [
                    'routeName' => 'admin.user.index',
                    'menuText'  => 'user_admin.page_link.all_user',
                    'icon'      => 'fas fa-caret-right',
                    'name'      => 'user',
                ],
            ],
        ],

    ],
];
