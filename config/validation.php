<?php

return [
    'authentication'     => [
        'email'            => 'sometimes|required|email|max:254|unique:users',
        'password'         => 'sometimes|required|min:8|confirmed',
        'currentPassword'  => 'sometimes|required|correct_password',
        'fk_permission_id' => 'required',
        'phone_number'     => 'sometimes|numeric',
        'image_path'       => 'sometimes|required_without:display_image|image|max:5000|dimensions:max_width=500,max_height=500',
    ],
    'reset_password'     => [
        'email'    => 'required|email|max:254',
        'password' => 'required|min:8|confirmed',
        'token'    => 'required',
    ],
    'recaptcha'          => [
        'g-recaptcha-response' => 'required|captcha',
    ],
    'user_registration'  => [
        'email' => 'required|email|max:254',
    ],
    'share'              => [
        'comment_text' => 'required|string|min:3|max:1000',
    ],
    'challenge'          => [
        'comment_text' => 'required|string|min:3|max:1000',
    ],
    'give'               => [
        'type'             => 'required|in:give,receive',
        'fk_category_id'   => 'required|numeric',
        'name'             => 'required|string|min:3|max:500',
        'address'          => 'sometimes|string',
        'description_text' => 'required|string|min:3|max:5000',
    ],
    'media'              => [
        'image' => 'image|max:2000|dimensions:max_width=2000,max_height=2000',
    ],
    'learn_admin'        => [
        'title_english'       => 'required|string|min:3|max:255',
        'description_english' => 'required|string|min:3|max:255',
        'content_english'     => 'required|string|min:3',
    ],
    'give_admin'         => [
        'type'                => 'required|in:give,receive',
        'fk_category_id'      => 'required|numeric',
        'title_english'       => 'required|string|min:3|max:255',
        'description_english' => 'required|string|min:3|max:5000',
        'amount'              => 'required|numeric',
        'address'             => 'sometimes|string',
    ],
    'share_admin'        => [
        'title_english'       => 'required|string|min:3|max:255',
        'title_thai'          => 'sometimes|max:255',
        'description_english' => 'required|string|min:3|max:255',
        'description_thai'    => 'sometimes|max:255',
        'content_english'     => 'required|string|min:3|max:5000',
        'content_thai'        => 'sometimes|max:5000',
    ],
    'challenge_admin'    => [
        'title_english'       => 'required|string|min:3|max:255',
        'title_thai'          => 'sometimes|max:255',
        'description_english' => 'required|string|min:3|max:255',
        'description_thai'    => 'sometimes|max:255',
        'content_english'     => 'required|string|min:3|max:5000',
        'content_thai'        => 'sometimes|max:5000',
    ],
    'events_admin'       => [
        'title_english'       => 'required|string|min:3|max:255',
        'description_english' => 'required|string|min:3|max:5000',
        'location_english'    => 'required|string|min:3|max:255',
        'host_english'        => 'required|string|min:3|max:255',
        'event_date'          => 'required|string|min:3|max:255',
        'link'                => 'required|string|min:3|max:255',
    ],
    'news_admin'         => [
        'title_english'       => 'required|string|min:3|max:255',
        'description_english' => 'required|string|min:3|max:5000',
        'content_english'     => 'required|string|min:3|max:5000',
    ],
    'organization_admin' => [
        'fk_category_id' => 'required|numeric',
        'name_english'   => 'required|string|min:3|max:200',
        'phone_number'   => 'required|numeric',
        'address'        => 'required|string|min:3|max:2000',
    ],
    'banner_admin'       => [
        'title_english'      => 'required|string|min:3|max:255',
        'image_path_english' => 'sometimes|required|image',
    ],
];