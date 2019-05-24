<?php

/**
 * Global routes
 */
function globalRoutes()
{
    Route::get( 'language/{languageCode}', 'LanguageController@changeLanguage' )->name( 'language.change' );

    Route::get( 'file/{url}', 'MediaController@getFile' )->name( 'getFile' );

    Route::get( '/', 'HomeController@index' )->name( 'home.index' );

    Route::group( [ 'prefix' => 'admin' ], function(){
        Route::get( '', 'AdminController@index' )->name( 'admin.index' );
        Route::get( 'learn-all', 'AdminController@learnAll' )->name( 'about.learnAll' );
    } );

    Route::middleware( 'guest' )->group( function(){

        Route::get( '/', 'HomeController@index' )->name( 'home.index' );
        Route::get( 'learn', 'LearnController@index' )->name( 'learn.index' );
        Route::get( 'share', 'ShareController@index' )->name( 'share.index' );
        Route::get( 'give', 'HomeController@index' )->name( 'give.index' );
        Route::get( 'give-by-category/{id}', 'GiveController@getGiveByCategory' )->name( 'give.getGiveByCategory' );
        Route::get( 'events', 'EventsController@index' )->name( 'events.index' );
        Route::get( 'news', 'NewsController@index' )->name( 'news.index' );
        Route::get( 'news/{id}', 'NewsController@detail' )->name( 'news.detail' );
        Route::get( 'organization', 'OrganizationController@index' )->name( 'organization.index' );

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
    } );

    Route::group( [ 'prefix' => 'admin' ], function(){

        Route::middleware( 'guest' )->group( function(){
            // Authentication
            Route::get( 'login', 'Admin\Auth\LoginController@showAdminLoginForm' )->name( 'admin.login' );
            Route::post( 'login', 'Admin\Auth\LoginController@login' )->name( 'admin.submitLogin' );
        } );

        Route::group( [ 'middleware' => 'auth.admin' ], function(){

            Route::get( '/', 'Admin\HomeController@index' )->name( 'admin.home.index' );

            Route::resource( 'user', 'Admin\UserController', [
                'except' => [ 'show', 'update' ],
                'names'  => addPrefixResourceRouteName( 'admin.user' ),
            ] );
        } );
    } );

}
