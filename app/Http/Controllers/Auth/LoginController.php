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
 * Class LoginController
 * @package App\Http\Controllers\Auth
 */
class LoginController extends Controller
{
    use AuthenticatesUsers {
        logout as traitLogout;
    }

    /**
     * The user has been authenticated.
     *
     * @param  \Illuminate\Http\Request $request HTTP request object
     * @param  mixed                    $user    User
     *
     * @return mixed
     */
    protected function authenticated( Request $request, $user )
    {
        return redirect()->intended( Utility::getRedirectedUrl( $request, App::getLocale() ) );
    }

    /**
     * Log the user out of the application.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function logout( Request $request )
    {
        $this->traitLogout( $request );

        return redirect()->route( 'home.index' );
    }

}
