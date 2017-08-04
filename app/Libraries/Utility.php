<?php
/**
 * General utility functions.
 */

namespace App\Libraries;

/**
 * This class keeps all utility functions for all classes.
 */
class Utility
{
    /**
     * Get base URL.
     *
     * @return string String Base URL
     */
    public static function getBaseUrl()
    {
        $protocol = ( isset( $_SERVER['HTTPS'] ) && $_SERVER['HTTPS'] === 'on' ) ? 'https' : 'http';

        return $protocol . '://' . $_SERVER['HTTP_HOST'];
    }

    /**
     * Get language code.
     *
     * @return string Language code
     */
    public static function getLanguageCode()
    {
        $language = config( 'app.fallback_locale' );

        if( !is_null( request()->route() ) ){

            preg_match( '@^(\w+)-@', request()->route()->getName(), $match );

            $prefix = count( $match ) ? $match[1] : '';

            if( in_array( $prefix, config( 'app.language_codes' ), true ) ){
                $language = $prefix;
            }
        }

        return $language;
    }

    /**
     * Get old language code.
     *
     * @return string Old language code
     */
    private static function getOldLanguageCode()
    {
        $oldCodeRegex = '@^' . Utility::getBaseUrl() . '/(\w+)@';

        preg_match( $oldCodeRegex, url()->previous(), $match );

        $oldCode = count( $match ) ? $match[1] : '';

        if( !in_array( $oldCode, config( 'app.language_codes' ) ) ){
            $oldCode = '';
        }

        return $oldCode;
    }

    /**
     * Get redirected URL.
     *
     * @param string  $languageCode Language code
     *
     * @return string Redirected URL
     */
    public static function getRedirectedUrl( string $languageCode )
    {
        $redirectedUrl = url()->previous();

        if( in_array( $languageCode, config( 'app.language_codes' ) ) ){

            $baseUrl       = Utility::getBaseUrl();
            $oldCode       = Utility::getOldLanguageCode();
            $newCode       = $languageCode !== config( 'app.fallback_locale' ) ? $languageCode : '';
            $regex         = '@^' . $baseUrl . ( $oldCode ? '(/' . $oldCode . '(/.+)|/' . $oldCode . '$)' : '(/.+)?' ) . '@';
            $replacement   = $baseUrl . ( $newCode ? '/' . $newCode : '' ) . ( $oldCode ? '${2}' : '${1}' );
            $redirectedUrl = preg_replace( $regex, $replacement, $redirectedUrl );
        }

        return $redirectedUrl;
    }
}
