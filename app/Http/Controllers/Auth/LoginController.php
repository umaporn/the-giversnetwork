<?php
/**
 * Login controller
 */

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Users;
use App\Support\Facades\Utility;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

/**
 * Login Controller
 * @package App\Http\Controllers\Auth
 */
class LoginController extends Controller
{
    /** @var Users User model */
    protected $usersModel;

    use AuthenticatesUsers {
        logout as traitLogout;
    }

    /**
     * LoginController constructor.
     *
     * @param Users $users Users model
     */
    public function __construct( Users $users )
    {
        $this->usersModel = $users;
    }

    /**
     * Handle a login request to the application.
     *
     * @param Request $request Recaptcha request object
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
     * @param \Illuminate\Http\Request $request HTTP request object
     * @param mixed                    $user    User
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse HTTP response object
     */
    protected function authenticated( Request $request, $user )
    {

        $redirectedUrl    = Utility::getRedirectedUrl( $request );
        $userData         = $this->usersModel->checkUserStatus( $this->credentials( $request ) );
        $userPermissionID = $userData['0']->getAttribute( 'fk_permission_id' );

        if( $userPermissionID === 1 ){
            $redirectedUrl = route('admin.home.index');
        }

        if( $request->expectsJson() ){

            $redirectedUrl = session()->pull( 'url.intended', $redirectedUrl );

            return response()->json( [ 'success' => true, 'redirectedUrl' => $redirectedUrl ] );
        }

        return redirect()->intended( $redirectedUrl );
    }

    /**
     * Attempt to log the user into the application.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return bool
     */
    protected function attemptLogin( Request $request )
    {
        if( $this->usersModel->checkUserStatus( $this->credentials( $request ) ) ){
            return $this->guard()->attempt(
                $this->credentials( $request ), $request->filled( 'remember' )
            );
        }
    }

    /**
     * Log the user out of the application.
     *
     * @param \Illuminate\Http\Request $request HTTP request object
     *
     * @return \Illuminate\Http\Response HTTP response object
     */
    public function logout( Request $request )
    {
        $this->guard()->logout();

        $request->session()->invalidate();

        return $this->loggedOut( $request ) ?: redirect( '/' );
    }

}
