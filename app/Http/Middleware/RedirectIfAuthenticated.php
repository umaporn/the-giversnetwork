<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request HTTP request object
     * @param  \Closure                 $next    Closer
     * @param  string|null              $guard   Guard name
     *
     * @return mixed
     */
    public function handle( $request, Closure $next, $guard = null )
    {
        if( Auth::guard( $guard )->check() ){
            return redirect()->route( 'home.index' );
        }

        return $next( $request );
    }
}
