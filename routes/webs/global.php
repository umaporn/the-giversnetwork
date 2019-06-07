<?php

/**
 * Global routes
 */
function globalRoutes()
{
    Route::get( 'language/{languageCode}', 'LanguageController@changeLanguage' )->name( 'language.change' );

    Route::get( 'file/{url}', 'MediaController@getFile' )->name( 'getFile' );

    Route::get( '/', 'HomeController@index' )->name( 'home.index' );

    Route::group( [ 'prefix' => 'learn', ], function(){
        Route::get( '', 'LearnController@index' )->name( 'learn.index' );
        Route::get( 'article', 'LearnController@article' )->name( 'learn.article' );
    } );

    Route::group( [ 'prefix' => 'share', ], function(){
        Route::get( '', 'ShareController@index' )->name( 'share.index' );
        Route::get( 'challenge', 'ShareController@challenge' )->name( 'share.challenge' );
        Route::get( 'article', 'ShareController@article' )->name( 'share.article' );
        Route::get( 'create-thread', 'ShareController@createThread' )->name( 'share.create_thread' );
    } );

    Route::group( [ 'prefix' => 'events', ], function(){
        Route::get( '', 'EventsController@index' )->name( 'events.index' );
        Route::get( 'article', 'EventsController@article' )->name( 'events.article' );
    } );

    Route::group( [ 'prefix' => 'give', ], function(){
        Route::get( '', 'GiveController@index' )->name( 'give.index' );
        Route::get( 'article', 'GiveController@article' )->name( 'give.article' );
        Route::get( 'add-item', 'GiveController@addItem' )->name( 'give.addItem' );
    } );

    Route::group( [ 'prefix' => 'admin' ], function(){
        Route::get( 'editprofile', 'AdminController@editProfile' )->name( 'admin.editProfile' );
        Route::get( 'learn-all', 'AdminController@learnAll' )->name( 'about.learnAll' );
    } );

    Route::get( 'signup', 'UsersController@signup' )->name( 'users.signup' );

    Route::group( [ 'prefix' => 'user' ], function(){
        Route::get( 'myprofile', 'UsersController@myProfile' )->name( 'users.myProfile' );
        Route::get( 'editprofile', 'UsersController@editProfile' )->name( 'users.editProfile' );
        Route::get( 'forgotpassword', 'UsersController@forgotPW' )->name( 'users.forgotPW' );
        Route::get( 'forgotpassword_sent', 'UsersController@forgotPW_sent' )->name( 'users.forgotPW_sent' );
    } );
    
/*
    Route::middleware( 'guest' )->group( function(){

        // Authentication
        Route::get( 'login', 'Auth\LoginController@showLoginForm' )->name( 'login' );
        Route::post( 'login', 'Auth\LoginController@login' )->name( 'submitLogin' );

        // Registration
        Route::get( 'register', 'Auth\RegisterController@showRegistrationForm' )->name( 'register' );
        Route::post( 'register', 'Auth\RegisterController@register' )->name( 'submitRegister' );

        // Password Reset
        Route::get( 'password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm' )->name( 'password.request' );
        Route::post( 'password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail' )->name( 'password.email' );
        
    } );

    Route::group( [ 'middleware' => 'auth' ], function(){
        Route::post( 'logout', 'Auth\LoginController@logout' )->name( 'logout' );
        Route::get( 'profile', 'ProfileController@getProfile' )->name( 'user.getProfile' );
        Route::post( 'profile', 'ProfileController@updateProfile' )->name( 'user.updateProfile' );
        Route::get( 'reset-password', 'ProfileController@resetPassword' )->name( 'user.resetPassword' );
        Route::get( '/', 'HomeController@index' )->name( 'home.index' );
    } );
    */
}
