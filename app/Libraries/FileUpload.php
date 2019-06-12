<?php
/**
 * File library
 */

namespace App\Libraries;

use Illuminate\Http\UploadedFile;
use Symfony\Component\HttpFoundation\File\File;

/**
 * This class handles uploading an image file to storage.
 */
class FileUpload
{
    /** Upload folder */
    const UPLOAD_FOLDER = 'uploads';

    /**
     * Upload an file to storage.
     *
     * @param UploadedFile $file   Uploaded file
     * @param string       $module Module name
     *
     * @return    array                         Uploaded file information
     */
    public static function upload( UploadedFile $file, string $module )
    {

        $filename = explode( '.', $file->getClientOriginalName() )[0] . '_' . date( 'His' ) . '.' . $file->extension();
        $fileInfo = $file->move( public_path( 'storage/' . self::UPLOAD_FOLDER . '/' . $module ), $filename );

        $uploadedFile = [
            'file_path' => self::UPLOAD_FOLDER . '/' . $module . '/' . $filename,
        ];

        return $uploadedFile;
    }

    /**
     * Create a new file.
     *
     * @param File   $file     Uploaded file
     * @param string $module   Module name
     * @param array  $fileInfo File information for creating a new image
     *
     * @return    string                 File path
     */
    private static function createFile( File $file, string $module, array $fileInfo )
    {
        $image       = InterventionFile::make( $file );
        $storagePath = 'storage/' . self::UPLOAD_FOLDER . '/' . $module . '/' . $fileInfo ['folder'] . '/';

        if( !is_dir( $storagePath ) ){
            mkdir( $storagePath, 0755 );
        }

        $filename = explode( '.', $file->getFilename() )[0];
        $filename .= '_' . $fileInfo ['filename'] . '.' . $file->getExtension();
        $filepath = public_path( $storagePath );

        $image->resize( $fileInfo ['width'], null, function( $constraint ){
            $constraint->aspectRatio();
        } )->save( $filepath . $filename );

        return self::UPLOAD_FOLDER . '/' . $module . '/' . $fileInfo ['folder'] . '/' . $filename;
    }

    /**
     * Delete an uploaded image.
     *
     * @param array $images      File path
     * @param array $imageFields File fields
     *
     * @return    void
     */
    public static function deleteFile( array $images, array $imageFields )
    {
        foreach( $images as $image ){
            foreach( $imageFields as $imageField ){

                $file_path = public_path( $image[ $imageField ] );

                if( is_file( $file_path ) ){
                    unlink( $file_path );
                }

            }
        }
    }

}