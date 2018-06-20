<?php
/**
 * Media Controller
 */

namespace App\Http\Controllers;

use App\Support\Facades\ClientGrant;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

/**
 * This class handles requesting a media from a web service request.
 * @package App\Http\Controllers
 */
class MediaController extends Controller
{
    /**
     * Get a file from a web service request.
     *
     * @param string $api Encrypted API
     *
     * @return BinaryFileResponse File
     */
    public function getFile( string $api )
    {
        $response = ClientGrant::call( 'GET', decrypt( $api ), [ 'isFile' => true ] );

        return response()->file( $response['file'], $response['header'] );
    }
}