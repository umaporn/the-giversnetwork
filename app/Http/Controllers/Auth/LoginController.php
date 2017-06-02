<?php
/**
 * Login controller
 */

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Libraries\Utility;
use Illuminate\Support\Facades\App;

/**
 * Login Controller
 * @package App\Http\Controllers\Auth
 */
class LoginController extends Controller
{
    use AuthenticatesUsers {
        logout as traitLogout;
    }

    /**
     * Redirect the user to another page after the user has been authenticated.
     *
     * @param  \Illuminate\Http\Request $request HTTP request object
     * @param  mixed                    $user    User
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse HTTP redirect response
     */
    protected function authenticated( Request $request, $user )
    {
        $redirectedUrl = Utility::getRedirectedUrl( $request, App::getLocale() );

        if( $request->ajax() ){

            $redirectedUrl = session()->pull( 'url.intended', $redirectedUrl );

            return response()->json( [ 'success' => true, 'redirectedUrl' => $redirectedUrl ], 302 );
        }

        return redirect()->intended( $redirectedUrl );
    }

    /**
     * Log the user out of the application.
     *
     * @param  \Illuminate\Http\Request $request HTTP request object
     *
     * @return \Illuminate\Http\Response HTTP response object
     */
    public function logout( Request $request )
    {
        $this->traitLogout( $request );

        return redirect()->route( 'home.index' );
    }

}
