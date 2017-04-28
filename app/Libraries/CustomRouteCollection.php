<?php
/**
 * Customize RouteCollection class.
 */

namespace App\Libraries;

use Illuminate\Routing\RouteCollection;
use Illuminate\Support\Facades\App;

/**
 * Class CustomRouteCollection
 * @package App\Libraries
 */
class CustomRouteCollection extends RouteCollection
{
    /**
     * Get a route instance by its name.
     *
     * @param  string $name Route name without language prefix
     *
     * @return \Illuminate\Routing\Route|null
     */
    public function getByName( $name )
    {
        $prefix = '';

        if( $name !== 'language.change' ){

            $language = App::getLocale();

            if( $language !== config( 'app.fallback_locale' ) ){
                $prefix = $language . '-';
            }
        }

        return parent::getByName( $prefix . $name );
    }
}