<?php

require 'webs/functions.php';

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

    Route::get( 'file/{api}', 'MediaController@getFile' )->name( 'getFile' );

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
        Route::get( 'profile', 'ProfileController@getProfile' )->name( 'user.getProfile' );
        Route::post( 'profile', 'ProfileController@updateProfile' )->name( 'user.updateProfile' );
        Route::get( 'reset-password', 'ProfileController@resetPassword' )->name( 'user.resetPassword' );
        Route::get( '/', 'HomeController@index' )->name( 'home.index' );
    } );
}

foreach( config( 'app.language_codes' ) as $languageCode ){

    $routePrefix = '';
    $urlPrefix   = '';

    if( $languageCode !== Utility::getDefaultLanguageCode() ){
        $urlPrefix   = $languageCode;
        $routePrefix = $languageCode . '-';
    }

    Route::group( [ 'prefix' => $urlPrefix, 'as' => $routePrefix ], function(){
        globalRoutes();
    } );
}