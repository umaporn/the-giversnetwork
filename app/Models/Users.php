<?php

namespace App\Models;

use App\Http\Requests\BannerRequest;
use App\Libraries\Image;
use App\Mail\RegisterMailer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Mail;

class Users extends Model
{

    use Notifiable;

    /** @var array A list of fields which are able to update in this model */
    protected $fillable = [ 'email', 'password', 'fk_permission_id', 'fk_interest_in_id', 'fk_organization_category_id', 'username', 'image_path',
                            'firstname', 'lastname', 'organization_name', 'phone_number', 'address', 'status' ];

    /** @var string Table name */
    protected $table = 'users';

    /** @var array Hidden attributes/fields */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Create a new user.
     *
     * @param Request $request Data for creating a new user
     *
     * @return Users              Users model
     */
    public function createUser( Request $request )
    {
        $imageInformation = $this->saveImage( $request );

        $newUser         = [
            'email'                       => $request->input( 'email' ),
            'password'                    => bcrypt( $request->input( 'password' ) ),
            'fk_permission_id'            => $request->input( 'fk_permission_id' ),
            'fk_interest_in_id'           => $request->input( 'fk_interest_in_id' ),
            'fk_organization_category_id' => $request->input( 'fk_organization_category_id' ),
            'username'                    => $request->input( 'username' ),
            'image_path'                  => $imageInformation['imageInformation']['original'],
            'firstname'                   => $request->input( 'firstname' ),
            'lastname'                    => $request->input( 'lastname' ),
            'organization_name'           => $request->input( 'organization_name' ),
            'phone_number'                => $request->input( 'phone_number' ),
            'address'                     => $request->input( 'address' ),
            'status'                      => 'draft',
        ];

        return $this->create( $newUser );
    }

    /**
     * Handle image upload from file browser.
     *
     * @param Request $request Request object
     *
     * @return array Image saved result
     */
    private function saveImage( Request $request )
    {
        $imageInformation = [ 'image_path' => '', ];
        $file             = $request->file( 'image_path' );
        $success          = true;

        if( $file ){

            $imageInformation = Image::upload( $file, 'users' );
            $success          = ( count( $imageInformation ) ) ? true : false;

            if( $this->id ){
                $this->deleteImage();
            }

        } else if( $this->id ){
            $attributes                     = $this->getAttributes();
            $imageInformation['image_path'] = $attributes['image_path'];
        }

        return [ 'success' => $success, 'imageInformation' => $imageInformation ];
    }

    /**
     * Delete an uploaded image.
     *
     * @return void
     */
    private function deleteImage()
    {
        $imagesFields = [ 'image_path' ];
        $attributes   = $this->getAttributes();

        $this->setAttribute( 'image_path', Storage::url( $attributes['image_path'] ) );

        Image::deleteImage( [ $this->getAttributes() ], $imagesFields );

    }
}
