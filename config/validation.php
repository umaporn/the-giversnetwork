<?php

return [
    'authentication'    => [
        'email'            => 'sometimes|required|email|max:254|unique:users',
        'password'         => 'sometimes|required|min:8|confirmed',
        'currentPassword'  => 'sometimes|required|correct_password',
        'fk_permission_id' => 'required',
        'phone_number'     => 'sometimes|numeric',
        'image_path'       => 'sometimes|required_without:display_image|image|max:5000|dimensions:max_width=500,max_height=500',
    ],
    'reset_password'    => [
        'email'    => 'required|email|max:254',
        'password' => 'required|min:8|confirmed',
        'token'    => 'required',
    ],
    'recaptcha'         => [
        'g-recaptcha-response' => 'required|captcha',
    ],
    'user_registration' => [
        'email' => 'required|email|max:254',
    ],
    'share'             => [
        'comment_text' => 'required|string|min:3|max:1000',
    ],
    'challenge'         => [
        'comment_text' => 'required|string|min:3|max:1000',
    ],
    'give'              => [
        'type'             => 'required|in:give,receive',
        'fk_category_id'   => 'required|numeric',
        'name'             => 'required|string|min:3|max:500',
        'amount'           => 'required|numeric',
        'address'          => 'sometimes|string',
        'description_text' => 'required|string|min:3|max:200',
    ],
    'media'             => [
        'image' => 'image|max:2000|dimensions:max_width=2000,max_height=2000',
    ],
];