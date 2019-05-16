<?php

namespace App\Models;

use App\Libraries\Image;
use App\Libraries\Search;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;

class Users extends Authenticatable
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
     * Get Permission model relationship.
     *
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo Permission model relationship
     */
    public function permission()
    {
        return $this->belongsTo( 'App\Models\Permission', 'fk_permission_id' );
    }

    /**
     * Create a new user.
     *
     * @param Request $request Data for creating a new user
     *
     * @return Users              Users model
     */
    public function createUser( Request $request )
    {
        $image_path       = '';
        $imageInformation = $this->saveImage( $request );

        if( isset( $imageInformation['imageInformation']['original'] ) ){
            $image_path = $imageInformation['imageInformation']['original'];
        }

        $newUser = [
            'email'                       => $request->input( 'email' ),
            'password'                    => bcrypt( $request->input( 'password' ) ),
            'fk_permission_id'            => $request->input( 'fk_permission_id' ),
            'fk_interest_in_id'           => $request->input( 'fk_interest_in_id' ),
            'fk_organization_category_id' => $request->input( 'fk_organization_category_id' ),
            'username'                    => $request->input( 'username' ),
            'image_path'                  => $image_path,
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
        $imageInformation = [];
        $file             = $request->file( 'image_path' );
        $success          = true;

        if( $file ){

            $imageInformation = Image::upload( $file, 'users' );
            $success          = ( count( $imageInformation ) ) ? true : false;

            if( $this->id ){
                $this->deleteImage();
            }

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

    /**
     * Get users profile information.
     *
     * @return Users[]|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    public function getUserProfile()
    {
        return $this->with( 'permission' )->where( [ 'id' => Auth::user()->id ] )->get();
    }

    /**
     * Check user status.
     *
     * @param array $userCredentials
     *
     * @return bool
     */
    public function checkUserStatus( array $userCredentials )
    {
        $result = $this->where( [ 'email' => $userCredentials['email'], 'status' => 'public', 'fk_permission_id' => '2' ] )
                       ->get();

        return $result->isEmpty();
    }

    /**
     * Update a user.
     *
     * @param Request $request User request object
     *
     * @return    array
     */
    public function updateUser( Request $request )
    {

        $data = $request->all();

        if( $request->file( 'image_path' ) ){
            $imageInformation = $this->saveImage( $request );

            if( isset( $imageInformation['imageInformation']['original'] ) ){
                $image_file = $imageInformation['imageInformation']['original'];

                $data['image_path'] = $image_file;
            }
        }

        $result = $this->where( 'id', Auth::user()->id )->update( $data );

        if( $result ){
            $response = [ 'success' => true, 'message' => __( 'user.saved_user_success' ), ];
        } else {
            $response = [ 'success' => false, 'message' => __( 'user.saved_user_error' ), ];
        }

        return $response;

    }

    /**
     * Check user status.
     *
     * @param array $userCredentials
     *
     * @return bool
     */
    public function checkAdminStatus( array $userCredentials )
    {
        $result = $this->where( [ 'email' => $userCredentials['email'], 'status' => 'public', 'fk_permission_id' => '1' ] )
                       ->get();

        return $result->isEmpty();
    }

    public function getUserList(Request $request)
    {
        $builder = $this->with( 'permission' );

        return Search::search( $builder, 'users', $request );
    }
}
