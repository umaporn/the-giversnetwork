<?php
/**
 * Password grant request management.
 */

namespace App\Libraries\WebServiceRequest;

/**
 * This class handles calling API functions through a web service which authorize by password grant.
 * @package App\Libraries\WebServiceRequest
 */
class PasswordGrantRequest extends BaseRequest
{
    /**
     * Attempt to log the user into the application.
     *
     * @param array $credentials Credentials
     *
     * @return bool Success status
     */
    public function attemptLogin( array $credentials )
    {
        session( [
                     'email'    => $credentials['email'],
                     'password' => encrypt( $credentials['password'] ),
                 ] );

        $this->refreshAccessToken();

        return empty( $this->getAccessToken() ) ? false : true;
    }

    /**
     * Refresh an access token.
     */
    protected function refreshAccessToken()
    {
        $this->requestAccessToken( [
                                       'grant_type'    => 'password',
                                       'client_id'     => env( 'OAUTH_PASSWORD_GRANT_CLIENT_ID' ),
                                       'client_secret' => env( 'OAUTH_PASSWORD_GRANT_CLIENT_SECRET' ),
                                       'username'      => session( 'email' ),
                                       'password'      => decrypt( session( 'password' ) ),
                                   ] );
    }

    /**
     * Get an access token.
     *
     * @return string Token type
     */
    protected function getAccessToken()
    {
        return isset( session( 'accessTokenProperties' )['access_token'] )
            ? session( 'accessTokenProperties' )['access_token'] : '';
    }

    /**
     * Save access token properties.
     *
     * @param array $properties Access token properties
     */
    protected function saveAccessTokenProperties( array $properties )
    {
        session( [ 'accessTokenProperties' => $properties ] );
    }

    /**
     * Get a token type.
     *
     * @return string Token type
     */
    protected function getTokenType()
    {
        return isset( session( 'accessTokenProperties' )['token_type'] )
            ? session( 'accessTokenProperties' )['token_type'] : '';
    }
}