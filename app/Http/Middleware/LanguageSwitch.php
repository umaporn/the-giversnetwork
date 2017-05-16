<?php
/**
 * Language switch middleware
 */

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Libraries\Utility;

/**
 * A middleware for switching system language
 * @package App\Http\Middleware
 */
class LanguageSwitch
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request Request object
     * @param Closure $next    Closer
     *
     * @return mixed
     */
    public function handle( Request $request, Closure $next )
    {
        App::setLocale( Utility::getLanguageCode() );

        return $next( $request );
    }
}
