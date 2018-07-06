<?php
/**
 * Register a user.
 */

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RecaptchaRequest;
use App\Support\Facades\ClientGrant;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\App;

/**
 * Register User Controller
 * @package App\Http\Controllers\Auth
 */
class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Register a new user.
     *
     * @param RecaptchaRequest $request Recaptcha request object
     *
     * @return \Illuminate\Http\JsonResponse Registration response
     */
    public function register( RecaptchaRequest $request )
    {
        $response = ClientGrant::call(
            'POST',
            '/api/beginning/register/' . App::getLocale(),
            [ 'form_params' => $request->all() ]
        );

        if( isset( $response['errors'] ) ){
            return response()->json( $response, 422 );
        }

        return response()->json( [ 'success' => $response['success'], 'message' => $response['message'] ] );
    }
}
