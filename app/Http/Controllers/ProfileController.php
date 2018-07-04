<?php
/**
 * Manage profile information.
 */

namespace App\Http\Controllers;

use App\Support\Facades\ClientGrant;
use App\Support\Facades\PasswordGrant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

/**
 * Profile Controller
 * @package App\Http\Controllers
 */
class ProfileController extends Controller
{
    /**
     * Load a profile page of the authenticated user.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View User's profile page
     */
    public function getProfile()
    {
        $response = PasswordGrant::call( 'GET', '/api/profile' );

        return view( 'users.profile', [ 'user' => $response['data'] ] );
    }

    /**
     * Update the authenticated user's profile.
     *
     * @param Request $request HTTP request object
     *
     * @return \Illuminate\Http\JsonResponse Update response
     */
    public function updateProfile( Request $request )
    {
        $parameters = [];

        foreach( $request->except( 'avatar' ) as $key => $value ){
            array_push( $parameters, [ 'name' => $key, 'contents' => $value ] );
        }

        if( $request->hasFile( 'avatar' ) ){
            array_push( $parameters, [
                'name'     => 'avatar',
                'contents' => file_get_contents( $request->file( 'avatar' )->path() ),
                'filename' => $request->file( 'avatar' )->getClientOriginalName(),
            ] );
        }

        $response = PasswordGrant::call( 'POST', '/api/profile', [ 'multipart' => $parameters ] );

        if( isset( $response['errors'] ) ){
            return response()->json( $response, 422 );
        }

        return response()->json( [
                                     'success'       => $response['success'],
                                     'message'       => $response['message'],
                                     'redirectedUrl' => url()->previous(),
                                 ] );
    }

    /**
     * Send password reset link by email.
     *
     * @param Request $request HTTP request object
     *
     * @return \Illuminate\Http\JsonResponse Sending password reset link response
     */
    public function resetPassword( Request $request )
    {
        $response = ClientGrant::call(
            'POST',
            '/api/beginning/password/email/' . App::getLocale(),
            [ 'form_params' => [ 'email' => $request->user()->getAuthIdentifier() ] ]
        );

        return response()->json( [ 'success' => $response['success'], 'message' => $response['message'] ] );
    }
}
