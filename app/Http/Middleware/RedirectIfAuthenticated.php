<?php
/**
 * Manage redirected page after the user has been authenticated
 */

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

/**
 * Redirect the user to another page if the user has been authenticated.
 * @package App\Http\Middleware
 */
class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request HTTP request object
     * @param \Closure                 $next    Closer
     * @param string|null              $guard   Guard name
     *
     * @return mixed
     */
    public function handle( $request, Closure $next, $guard = null )
    {
        if( Auth::guard( $guard )->check() ){
            if( Auth::user()->fk_permission_id == '1' ){
                return redirect( route( 'admin.home.index' ) );
            } else {
                return redirect( route( 'home.index' ) );
            }
        }

        return $next( $request );
    }
}
