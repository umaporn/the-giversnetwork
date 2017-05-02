<?php
/**
 * Reset the password.
 */

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;

/**
 * Class ResetPasswordController
 * @package App\Http\Controllers\Auth
 */
class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
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
     * @return array
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
     * @return \Illuminate\Http\RedirectResponse HTTP redirect response
     */
    protected function sendResetResponse( $response )
    {
        return redirect()->route( 'home.index' )->with( 'status', __( $response ) );
    }

}
