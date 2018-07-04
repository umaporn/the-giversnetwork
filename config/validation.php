<?php

return [
    'authentication' => [
        'email'           => 'sometimes|required|email|max:254|unique:users',
        'password'        => 'sometimes|required|min:8|confirmed',
        'currentPassword' => 'sometimes|required|correct_password',
    ],
    'reset_password' => [
        'email'    => 'required|email|max:254',
        'password' => 'required|min:8|confirmed',
        'token'    => 'required',
    ],
    'recaptcha'      => [
        'g-recaptcha-response' => 'required',
    ],
];