<?php
/**
 * Handle image upload.
 */
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ImageRequest;
use App\Libraries\Image;

/**
 * This class is an image controller.
 */
class ImageController extends Controller
{
    /**
     * Handle image upload from TinyMCE file browser window.
     *
     * @param     ImageRequest    $request    Image request object
     * @return    \Illuminate\Http\JsonResponse
     */
    public function upload( ImageRequest $request )
    {
        $image = $request->file( 'image' );

        if( $image ){
            $uploaded = Image::upload( $image, 'images' );

            return response()->json([
                        'success' => true,
                        'path'    => '/storage/' . $uploaded['original'],
                    ]);
        }
        else{
            return response()->json([
                        'success' => false,
                    ]);
        }
    }

}
