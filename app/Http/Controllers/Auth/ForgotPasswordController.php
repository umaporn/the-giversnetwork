<?php
/**
 * Send resetting password request.
 */

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Support\Facades\ClientGrant;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Support\Facades\App;
use App\Http\Requests\RecaptchaRequest;
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
     * Send a reset link by email.
     *
     * @param RecaptchaRequest $request HTTP RecaptchaRequest request object
     *
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse Sending a reset link response
     */
    public function sendResetLinkEmail( RecaptchaRequest $request )
    {
        $response = ClientGrant::call(
            'POST',
            '/api/beginning/password/email/' . App::getLocale(),
            [ 'form_params' => $request->all() ]
        );

        if( isset( $response['errors'] ) ){

            if( $request->expectsJson() ){
                return response()->json( $response, 422 );
            }

            return redirect()->back()->withErrors( $response['errors'] );
        }

        if( $request->expectsJson() ){
            return response()->json( [
                                         'success'       => $response['success'],
                                         'message'       => $response['message'],
                                         'redirectedUrl' => route( 'login' ),
                                     ] );
        }

        return redirect()->back()->with( [ 'status' => $response['message'] ] );
    }

}
