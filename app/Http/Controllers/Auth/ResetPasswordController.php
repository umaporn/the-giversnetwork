<?php
/**
 * Reset the password.
 */

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;

/**
 * Reset Password Controller
 * @package App\Http\Controllers\Auth
 */
class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Reset Password Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Get the password reset validation rules.
     *
     * @return array Password reset rule
     */
    protected function rules()
    {
        return config( 'validation.reset_password' );
    }

    /**
     * Get the response for a successful password reset.
     *
     * @param  string $response Response message
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse HTTP response object
     */
    protected function sendResetResponse( $response )
    {
        $redirectedUrl  = route( 'home.index' );
        $successMessage = __( $response );

        if( request()->expectsJson() ){
            return response()->json( [ 'success' => true, 'message' => $successMessage, 'redirectedUrl' => $redirectedUrl ] );
        }

        return redirect( $redirectedUrl )->with( 'status', $successMessage );
    }

    /**
     * Get the response for a failed password reset.
     *
     * @param  \Illuminate\Http\Request $request  HTTP request object
     * @param  string                   $response Response message
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse HTTP response object
     */
    protected function sendResetFailedResponse( Request $request, $response )
    {
        $error = [ 'email' => __( $response ) ];

        if( $request->expectsJson() ){
            return response()->json( $error, 422 );
        }

        return redirect()->back()->withInput( $request->only( 'email' ) )->withErrors( $error );
    }
}
