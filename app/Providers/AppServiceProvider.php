<?php
/**
 * Application Service Provider
 */

namespace App\Providers;

use App\Libraries\CustomRouteCollection;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

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

        Validator::extend( 'correct_password', 'App\Libraries\ValidationRules\Common@validatePassword' );
        Validator::extend( 'zero_or_exists', 'App\Libraries\ValidationRules\Common@validateZeroOrExistsRule' );
        Validator::extend( 'checkbox_in', 'App\Libraries\ValidationRules\Common@validateCheckboxInRule' );
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
