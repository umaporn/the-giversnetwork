<?php
/**
 * Login controller
 */

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Libraries\Utility;
use App\Libraries\WebServiceRequest\PasswordGrantRequest;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
     * Handle a login request to the application.
     *
     * @param  \Illuminate\Http\Request $request HTTP request object
     *
     * @return \Illuminate\Http\Response Login response
     *
     * @throws \Illuminate\Validation\ValidationException Validation exception
     */
    public function login( Request $request )
    {
        // If the class is using the ThrottlesLogins trait, we can automatically throttle
        // the login attempts for this application. We'll key this by the username and
        // the IP address of the client making these requests into this application.
        if( $this->hasTooManyLoginAttempts( $request ) ){
            $this->fireLockoutEvent( $request );
            $this->sendLockoutResponse( $request );
        }

        if( $this->attemptLogin( $request ) ){
            return $this->sendLoginResponse( $request );
        }

        // If the login attempt was unsuccessful we will increment the number of attempts
        // to login and redirect the user back to the login form. Of course, when this
        // user surpasses their maximum number of attempts they will get locked out.
        $this->incrementLoginAttempts( $request );
        $this->sendFailedLoginResponse( $request );
    }

    /**
     * Redirect the user to another page after the user has been authenticated.
     *
     * @param  \Illuminate\Http\Request $request HTTP request object
     * @param  mixed                    $user    User
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse HTTP response object
     */
    protected function authenticated( Request $request, $user )
    {
        $redirectedUrl = Utility::getRedirectedUrl( $request );

        if( $request->expectsJson() ){

            $redirectedUrl = session()->pull( 'url.intended', $redirectedUrl );

            return response()->json( [ 'success' => true, 'redirectedUrl' => $redirectedUrl ] );
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

    /**
     * Attempt to log the user into the application.
     *
     * @param Request $request HTTP request object
     *
     * @return bool Success status
     */
    protected function attemptLogin( Request $request )
    {
        $oauth   = new PasswordGrantRequest();
        $success = $oauth->attemptLogin( $this->credentials( $request ) );

        if( $success ){
            $this->guard()->login( Auth::getProvider()->retrieveByCredentials( $this->credentials( $request ) ) );
        }

        return $success;
    }

}
