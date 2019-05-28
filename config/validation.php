<?php

return [
    'authentication' => [
        'email'             => 'sometimes|required|email|max:254|unique:users',
        'password'          => 'sometimes|required|min:8|confirmed',
        'currentPassword'   => 'sometimes|required|correct_password',
        'fk_permission_id'  => 'required',
        'image_path'        => 'sometimes|required_without:display_image|image|max:1000|dimensions:max_width=500,max_height=500',
    ],
    'reset_password' => [
        'email'    => 'required|email|max:254',
        'password' => 'required|min:8|confirmed',
        'token'    => 'required',
    ],
    'recaptcha'      => [
        'g-recaptcha-response' => 'required|captcha',
    ],
];