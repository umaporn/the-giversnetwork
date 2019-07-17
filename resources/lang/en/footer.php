<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Bottom Menu
    |--------------------------------------------------------------------------
    */

    'bottom_menu_1' => [
        'title' => 'Menu',
    ],
    'bottom_menu_2' => [
        'title' => 'Member',
    ],
    'bottom_menu_3' => [
        'title' => 'The Giver Network',
        'list'  => [
            [
                'url'  => route( 'about.index' ),
                'text' => 'About us',
            ],
            // [
            //     'url'  => '#',
            //     'text' => 'Contact us',
            // ],
        ],
    ],

    'join_me'          => 'Let\'s change the world together! Will you join us?',
    'copy_rights'      => '©' . date( 'Y' ) . ' The Giver Network',
    'term_of_services' => 'Terms of Service',
    'policy'           => 'Privacy Policy',
];
