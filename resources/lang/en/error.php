<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Errors
    |--------------------------------------------------------------------------
    */

    '403' => [
        'page_title'       => 'Unauthorized Access',
        'page_description' => 'Unauthorized Access',
        'page_heading'     => 'Unauthorized Access',
        'message'          => 'You do not have authorized access.',
    ],

    '404' => [
        'page_title'       => 'Page Not Found',
        'page_description' => 'Page Not Found',
        'page_heading'     => 'Page Not Found',
        'message'          => 'Unfortunately, not found your request page.',
    ],

    '405' => [
        'page_title'       => 'Method Not Allowed',
        'page_description' => 'Method Not Allowed',
        'page_heading'     => 'Method Not Allowed',
        'message'          => 'You are accessing to an unknown page.',
    ],

    '500' => [
        'page_title'       => 'Internal Server Error',
        'page_description' => 'Internal Server Error',
        'page_heading'     => 'Internal Server Error',
    ],

    '503' => [
        'page_title'       => 'Service Unavailable',
        'page_description' => 'Service Unavailable',
        'page_heading'     => 'Service Unavailable',
        'message'          => 'Be right back.',
        'reason'           => 'Reason',
        'retry_after'      => 'Please retry after :beginTime.',
    ],

];