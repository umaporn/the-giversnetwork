<?php
/**
 * This is a middle ware class.
 */

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Libraries\Utility;

/**
 * A middle ware class for switching language.
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
