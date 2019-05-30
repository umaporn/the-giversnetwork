<?php
/**
 * Password Reset Request Controller
 */

namespace App\Http\Controllers\APIs;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

/**
 * Password Reset Request Controller
 * @package App\Http\Controllers\APIs
 */
class PasswordResetRequestController extends Controller
{
    use SendsPasswordResetEmails;

    /**
     * Request password reset by sending password reset link in an email.
     *
     * @param Request $request      HTTP request object
     * @param string  $languageCode Language code
     *
     * @return JsonResponse Password reset request response
     */
    public function requestPasswordReset( Request $request, string $languageCode = 'en' ): JsonResponse
    {
        App::setLocale( $languageCode );

        return $this->sendResetLinkEmail( $request );
    }

    /**
     * Get the response for a successful password reset link.
     *
     * @param Request $request  HTTP request object
     * @param string  $response Response message
     *
     * @return JsonResponse HTTP response object
     */
    protected function sendResetLinkResponse( Request $request, $response ): JsonResponse
    {
        return response()->json( [ 'success' => true, 'message' => __( $response ) ] );
    }

    /**
     * Get the response for a failed password reset link.
     *
     * @param Request $request  HTTP      request object
     * @param string  $response Response message
     *
     * @return JsonResponse HTTP response object
     */
    protected function sendResetLinkFailedResponse( Request $request, $response ): JsonResponse
    {
        return response()->json( [ 'errors' => [ 'email' => __( $response ) ] ], 422 );
    }

    /**
     * Validate the email for the given request.
     *
     * @param Request $request HTTP request object
     */
    protected function validateEmail( Request $request ): void
    {
        $request->validate( [ 'email' => config( 'validation.user_registration.email' ) ] );
    }

}
