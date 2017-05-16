<?php
/**
 * Application Service Provider
 */

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Validator;
use App\Libraries\CustomRouteCollection;

/**
 * Application Service Provider
 * @package App\Providers
 */
class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer( 'layouts.app', 'App\ViewComposers\MenuComposer' );

        Validator::extend( 'correct_password', 'App\Libraries\ValidationRules@validatePassword' );
        Validator::extend( 'zero_or_exists', 'App\Libraries\ValidationRules@validateZeroOrExistsRule' );
        Validator::extend( 'checkbox_in', 'App\Libraries\ValidationRules@validateCheckboxInRule' );
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app['router']->setRoutes( new CustomRouteCollection() );
    }
}
