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
        Route::post( 'like/{challenge}', 'ChallengeController@saveLike' )->name( 'challenge.saveLike' );
        Route::post( 'comment/{challenge}', 'ChallengeController@saveComment' )->name( 'challenge.saveComment' );
        Route::get( 'comment/{challenge}', 'ChallengeController@getCommentList' )->name( 'challenge.commentList' );
        Route::delete( 'comment/{comment}', 'ChallengeController@deleteComment' )->name( 'challenge.removeComment' );
    } );

    Route::group( [ 'prefix' => 'give', ], function(){
        Route::get( '', 'GiveController@index' )->name( 'give.index' );
        Route::get( 'create-item', 'GiveController@showCreateItemForm' )->name( 'give.showCreateItemForm' );
        Route::post( 'create-item', 'GiveController@createGiveItem' )->name( 'give.createGiveItem' );
        Route::get( 'by-category/{id}', 'GiveController@getGiveByCategory' )->name( 'give.getGiveByCategory' );
        Route::get( 'list', 'GiveController@getGiveList' )->name( 'give.list' );
        Route::get( '{give}', 'GiveController@detail' )->name( 'give.detail' );
        Route::get( 'article', 'GiveController@article' )->name( 'give.article' );
    } );

    Route::group( [ 'prefix' => 'events', ], function(){
        Route::get( '', 'EventsController@index' )->name( 'events.index' );
        Route::get( '{events}', 'EventsController@detail' )->name( 'events.detail' );
    } );

    Route::group( [ 'prefix' => 'news', ], function(){
        Route::get( '', 'NewsController@index' )->name( 'news.index' );
        Route::get( '{news}', 'NewsController@detail' )->name( 'news.detail' );
        Route::get( 'article', 'NewsController@article' )->name( 'news.article' );
    } );

    Route::group( [ 'prefix' => 'organization', ], function(){
        Route::get( '', 'OrganizationController@index' )->name( 'organization.index' );
        Route::get( '{organization}', 'OrganizationController@detail' )->name( 'organization.detail' );
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
        Route::get( 'organization-all', 'AdminController@organizationAll' )->name( 'admin.organizationAll' );
        Route::get( 'organization-add', 'AdminController@organizationAdd' )->name( 'admin.organizationAdd' );
        Route::get( 'user-all', 'AdminController@userAll' )->name( 'admin.userAll' );
    } );

    Route::group( [ 'prefix' => 'organization', ], function(){
        Route::get( '', 'OrganizationController@index' )->name( 'organization.index' );
        Route::get( '{organization}', 'OrganizationController@detail' )->name( 'organization.detail' );
    } );

    Route::get( 'profile/{user}', 'ProfileController@getUserProfile' )->name( 'user.getUserProfile' );

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
