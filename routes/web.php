<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

function globalRoutes()
{
    Route::get( 'language/{languageCode}', 'LanguageController@changeLanguage' )->name( 'language.change' );

    Route::post( 'logout', 'Auth\LoginController@logout' )->name( 'logout' );

    Route::group( [ 'middleware' => 'guest' ], function(){
        // Authentication
        Route::get( 'login', 'Auth\LoginController@showLoginForm' )->name( 'login' );
        Route::post( 'login', 'Auth\LoginController@login' )->name( 'submitLogin' );

        // Registration
        Route::get( 'register', 'Auth\RegisterController@showRegistrationForm' )->name( 'register' );
        Route::post( 'register', 'Auth\RegisterController@register' )->name( 'submitRegister' );

        // Password Reset
        Route::get( 'password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm' )->name( 'password.request' );
        Route::post( 'password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail' )->name( 'password.email' );
        Route::get( 'password/reset/{token}', 'Auth\ResetPasswordController@showResetForm' )->name( 'password.reset' );
        Route::post( 'password/reset', 'Auth\ResetPasswordController@reset' )->name( 'password.change' );
    } );

    Route::group( [ 'middleware' => 'auth' ], function(){

        Route::get( 'profile', 'UserController@profile' )->name( 'user.profile' );
        Route::put( 'change-password', 'UserController@changePassword' )->name( 'user.changePassword' );
        Route::get( '/', 'HomeController@index' )->name( 'home.index' );

        Route::get( 'manage-menu-title', 'MenuController@index' )->name( 'menu.index' );
        Route::get( 'manage-menu-title/getlist', 'MenuController@getOriginalTranslationlist' )->name( 'menu.getlist' );
        Route::get( 'manage-menu-title/edit', 'MenuController@edit' )->name( 'menu.edit' );
        Route::post( 'manage-menu-title/edit', 'MenuController@update' )->name( 'menu.update' );

    } );
}

foreach( config( 'app.language_codes' ) as $languageCode ){

    $routePrefix = '';
    $urlPrefix   = '';

    if( $languageCode !== config( 'app.fallback_locale' ) ){
        $urlPrefix   = $languageCode;
        $routePrefix = $languageCode . '-';
    }

    Route::group( [ 'prefix' => $urlPrefix, 'as' => $routePrefix ], function(){
        globalRoutes();
    } );
}