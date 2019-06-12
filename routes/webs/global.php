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
        Route::get( 'list/{page}', 'LearnController@getLearnList' )->name( 'learn.list' );
        Route::get( '{learn}', 'LearnController@detail' )->name( 'learn.detail' );
    } );

    Route::group( [ 'prefix' => 'share', ], function(){
        Route::get( '', 'ShareController@index' )->name( 'share.index' );
        Route::get( 'create-thread', 'ShareController@showCreateThreadForm' )->name( 'share.showCreateThreadForm' );
        Route::post( 'create-thread', 'ShareController@createThread' )->name( 'share.createThread' );
        Route::get( '{share}', 'ShareController@detail' )->name( 'share.detail' );
        Route::post( 'like/{share}', 'ShareController@saveLike' )->name( 'share.saveLike' );
        Route::post( 'comment/{share}', 'ShareController@saveComment' )->name( 'share.saveComment' );
        Route::get( 'comment/{share}', 'ShareController@getCommentList' )->name( 'share.commentList' );
        Route::delete( 'comment/{comment}', 'ShareController@deleteComment' )->name( 'share.removeComment' );
    } );

    Route::group( [ 'prefix' => 'challenge' ], function(){
        Route::get( '', 'ChallengeController@index' )->name( 'challenge.index' );
        Route::get( '{challenge}', 'ChallengeController@detail' )->name( 'challenge.detail' );
    } );

    Route::group( [ 'prefix' => 'give', ], function(){
        Route::get( '', 'GiveController@index' )->name( 'give.index' );
        Route::get( 'by-category/{id}', 'GiveController@getGiveByCategory' )->name( 'give.getGiveByCategory' );
        Route::get( '{give}', 'GiveController@detail' )->name( 'give.detail' );
    } );

    Route::group( [ 'prefix' => 'events', ], function(){
        Route::get( '', 'EventsController@index' )->name( 'events.index' );
        Route::get( '{events}', 'EventsController@detail' )->name( 'events.detail' );
    } );

    Route::group( [ 'prefix' => 'news', ], function(){
        Route::get( '', 'NewsController@index' )->name( 'news.index' );
        Route::get( '{news}', 'NewsController@detail' )->name( 'news.detail' );
    } );

    Route::group( [ 'prefix' => 'organization', ], function(){
        Route::get( '', 'OrganizationController@index' )->name( 'organization.index' );
        Route::get( '{organization}', 'OrganizationController@detail' )->name( 'organization.detail' );
    } );

    Route::middleware( 'guest' )->group( function(){
        // Authentication
        Route::post( 'login', 'Auth\LoginController@login' )->name( 'submitLogin' );

        // Registration
        Route::get( 'signup', 'Auth\RegisterController@showRegistrationForm' )->name( 'register' );
        Route::post( 'signup', 'Auth\RegisterController@register' )->name( 'submitRegister' );

        // Password Reset
        Route::get( 'password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm' )->name( 'password.request' );
        Route::post( 'password/email', 'Auth\ForgotPasswordController@sendResetPasswordLink' )->name( 'password.email' );
        Route::get( 'password/reset/{token}', 'Auth\ResetPasswordController@showResetForm' )->name( 'password.reset' );
        Route::post( 'password/reset', 'Auth\ResetPasswordController@reset' )->name( 'password.change' );
    } );

    Route::group( [ 'middleware' => 'auth' ], function(){
        Route::post( 'logout', 'Auth\LoginController@logout' )->name( 'logout' );
        Route::get( 'my-profile', 'ProfileController@getProfile' )->name( 'user.getProfile' );
        Route::get( 'profile/{user}', 'ProfileController@getUserProfile' )->name( 'user.getUserProfile' );
        Route::get( 'edit-profile', 'ProfileController@getEditProfileForm' )->name( 'user.editProfile' );
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

            Route::get( '', 'Admin\HomeController@index' )->name( 'admin.home.index' );

            Route::resource( 'user', 'Admin\UserController', [
                'except' => [ 'show', 'update' ],
                'names'  => addPrefixResourceRouteName( 'admin.user' ),
            ] );

        } );
    } );

}
