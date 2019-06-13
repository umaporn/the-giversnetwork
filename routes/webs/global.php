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
        Route::get( 'article', 'ShareController@article' )->name( 'share.article' );
        Route::get( 'create-thread', 'ShareController@createThread' )->name( 'share.create_thread' );
        Route::group( [ 'prefix' => 'challenge', ], function(){
            Route::get( '', 'ShareController@challenge' )->name( 'share.challenge' );
            Route::get( 'article', 'ShareController@challenge_article' )->name( 'share.challenge_article' );
        } );
    } );

    Route::group( [ 'prefix' => 'give', ], function(){
        Route::get( '', 'GiveController@index' )->name( 'give.index' );
        Route::get( 'article', 'GiveController@article' )->name( 'give.article' );
        Route::get( 'create-item', 'GiveController@createItem' )->name( 'give.create_item' );
    } );

    Route::group( [ 'prefix' => 'events', ], function(){
        Route::get( '', 'EventsController@index' )->name( 'events.index' );
        Route::get( 'article', 'EventsController@article' )->name( 'events.article' );
    } );

    Route::group( [ 'prefix' => 'news', ], function(){
        Route::get( '', 'NewsController@index' )->name( 'news.index' );
        Route::get( 'article', 'NewsController@article' )->name( 'news.article' );
    } );

    Route::group( [ 'prefix' => 'organization', ], function(){
        Route::get( '', 'OrganizationController@index' )->name( 'organization.index' );
        Route::get( 'profile', 'OrganizationController@profile' )->name( 'organization.profile' );
    } );

    Route::group( [ 'prefix' => 'about', ], function(){
        Route::get( '', 'AboutController@index' )->name( 'about.index' );
    } );

    Route::group( [ 'prefix' => 'admin' ], function(){
        Route::get( 'editprofile', 'AdminController@editProfile' )->name( 'admin.editProfile' );
        Route::get( 'learn-all', 'AdminController@learnAll' )->name( 'admin.learnAll' );
        Route::get( 'learn-add', 'AdminController@learnAdd' )->name( 'admin.learnAdd' );
        Route::get( 'share-challenge-all', 'AdminController@shareChAll' )->name( 'admin.shareChAll' );
        Route::get( 'share-challenge-add', 'AdminController@shareChAdd' )->name( 'admin.shareChAdd' );
        Route::get( 'share-all', 'AdminController@shareAll' )->name( 'admin.shareAll' );
        Route::get( 'share-add', 'AdminController@shareAdd' )->name( 'admin.shareAdd' );
        Route::get( 'give-all', 'AdminController@giveAll' )->name( 'admin.giveAll' );
        Route::get( 'receive-all', 'AdminController@recAll' )->name( 'admin.recAll' );
        Route::get( 'give-add', 'AdminController@giveAdd' )->name( 'admin.giveAdd' );
        Route::get( 'event-all', 'AdminController@eventAll' )->name( 'admin.eventAll' );
        Route::get( 'event-add', 'AdminController@eventAdd' )->name( 'admin.eventAdd' );
        Route::get( 'news-all', 'AdminController@newsAll' )->name( 'admin.newsAll' );
        Route::get( 'news-add', 'AdminController@newsAdd' )->name( 'admin.newsAdd' );
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
