<?php
/**
 * Send resetting password request.
 */

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;

/**
 * Forgot Password Controller
 * @package App\Http\Controllers\Auth
 */
class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Forgot Password Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;

    /**
     * Get the response for a successful password reset link.
     *
     * @param  string $response Response message
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse HTTP response object
     */
    protected function sendResetLinkResponse( $response )
    {
        $successMessage = __( $response );

        if( request()->expectsJson() ){
            return response()->json( [ 'success' => true, 'message' => $successMessage ] );
        }

        return back()->with( 'status', $successMessage );
    }

    /**
     * Get the response for a failed password reset link.
     *
     * @param  \Illuminate\Http\Request $request  HTTP      request object
     * @param  string                   $response Response message
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse HTTP response object
     */
    protected function sendResetLinkFailedResponse( Request $request, $response )
    {
        $error = [ 'email' => __( $response ) ];

        if( $request->expectsJson() ){
            return response()->json( [ 'errors' => $error ], 422 );
        }

        return back()->withErrors( $error );
    }
}
