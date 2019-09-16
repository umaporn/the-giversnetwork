<?php
/**
 * Give Model
 */

namespace App\Models;

use App\Http\Requests\GiveRequest;
use App\Libraries\Image;
use App\Libraries\Search;
use App\Libraries\Utility;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class Give extends Model
{
    /** @var array A list of fields which are able to update in this model */
    protected $fillable = [ 'fk_user_id', 'fk_category_id', 'type', 'title_thai', 'title_english',
                            'description_thai', 'description_english', 'amount', 'address', 'view',
                            'expired_date', 'status', ];

    /** @var string Table name */
    protected $table = 'give';

    /**
     * Get give category model relationship.
     *
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo Give category model relationship
     */
    public function giveCategory()
    {
        return $this->belongsTo( 'App\Models\GiveCategory', 'fk_category_id' );
    }

    /**
     * Get give image model relationship.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany GiveImage model relationship
     */
    public function giveImage()
    {
        return $this->HasMany( 'App\Models\GiveImage', 'fk_give_id' );
    }

    /**
     * Get users model relationship.
     *
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo Users model relationship
     */
    public function users()
    {
        return $this->belongsTo( 'App\Models\Users', 'fk_user_id' );
    }

    /**
     * Get a list of give for displaying.
     *
     * @param Request $request Request object
     *
     * @return LengthAwarePaginator  A list of give for home page
     */
    public function getHomeGiveList( Request $request )
    {
        $builder = $this->with( [ 'giveImage' ] )
                        ->where( [ 'status' => 'public', 'type' => 'give' ] );

        if( $request->get('id') ){
            $builder->where( [ 'fk_category_id' => $request->get('id') ] );
        }

        $data = Search::search( $builder, 'give', $request, [], '9' );

        return $this->transformGiveContent( $data );
    }

    /**
     * Transform give information.
     *
     * @param LengthAwarePaginator $giveList A list of give
     *
     * @return LengthAwarePaginator Home give list for display
     */
    private function transformGiveContent( LengthAwarePaginator $giveList )
    {
        foreach( $giveList as $list ){
            $list->setAttribute( 'title', Utility::getLanguageFields( 'title', $list ) );
            $list->setAttribute( 'category_title', Utility::getLanguageFields( 'title', $list->giveCategory ) );
            $list->setAttribute( 'image_path', $this->getFirstImages( $list ) );
            $this->setExpiredDateForFrontEnd( $list );
        }

        return $giveList;
    }

    /**
     * Set public date attribute.
     *
     * @param Give $give Give model
     *
     * @return void
     */
    private function setExpiredDateForFrontEnd( Give $give )
    {
        $give->setAttribute( 'public_date',
                             date( 'd', strtotime( $give->public_date ) ) . ' ' .
                             date( 'F', strtotime( $give->public_date ) ) . ' ' .
                             date( 'Y', strtotime( $give->public_date ) )
        );
    }

    /**
     * Get a new image list into an image store.
     *
     * @param Give   $give      Give model
     * @param string $imageSize Image size
     *
     * @return array Image store
     */
    public function getFirstImages( Give $give, string $imageSize = 'original' )
    {
        $imageStore = '';

        foreach( $give->giveImage as $image ){

            $attributes = $image->getAttributes();
            if( preg_match( '/^(http|https):\\/\\/[a-z0-9_]+([\\-\\.]{1}[a-z_0-9]+)*\\.[_a-z]{2,5}' . '((:[0-9]{1,5})?\\/.*)?$/i', $attributes[ $imageSize ] ) ){
                $imageStore = $attributes[ $imageSize ];
            } else {
                $imageStore = Storage::url( $attributes[ $imageSize ] );
            }

        }

        return $imageStore;
    }

    /**
     * Get give all list.
     *
     * @param Request $request Request object
     *
     * @return LengthAwarePaginator Give list for display
     */
    public function getGiveAllList( Request $request )
    {
        $type           = $request->get( 'type' ) ? $request->get( 'type' ) : '';
        $fk_category_id = $request->get( 'category_id' ) ? $request->get( 'category_id' ) : '';

        $builder = $this->with( [ 'giveCategory' ] )
                        ->orderBy( 'id', 'desc' )
                        ->where( [ 'status' => 'public' ] );

        if( $fk_category_id ){
            $builder->where( [ 'fk_category_id' => $fk_category_id ] );
        }
        if( $type ){
            $builder->where( [ 'type' => $type ] );
        }

        $data = Search::search( $builder, 'give', $request );

        return $this->transformGiveContent( $data );
    }

    /**
     * Get give detail information.
     *
     * @param Give $give Give model
     *
     * @return Give give detail
     */
    public function getGiveDetail( Give $give )
    {
        $give = $this->with( [ 'giveImage' ] )
                     ->with( [ 'giveCategory' ] )
                     ->with( [ 'users' ] )
                     ->where( [ 'id' => $give->id ] )->first();

        if( $give ){
            $give->setAttribute( 'title', Utility::getLanguageFields( 'title', $give ) );
            $give->setAttribute( 'description', Utility::getLanguageFields( 'description', $give ) );
            $give->setAttribute( 'category_title', Utility::getLanguageFields( 'title', $give->giveCategory ) );
            $this->setDateForFrontEnd( $give );
            foreach( $give->giveImage as $give_image ){
                $give_image->setAttribute( 'image_path', $this->getGiveImages( $give_image ) );
                $give_image->setAttribute( 'alt', Utility::getLanguageFields( 'alt', $give_image ) );
            }
        }

        return $give;
    }

    /**
     * Get a give image list into an image store.
     *
     * @param GiveImage $giveImage Give model
     *
     * @return array Image store
     */
    public function getGiveImages( GiveImage $giveImage )
    {

        $attributes = $giveImage->getAttributes();

        if( preg_match( '/^(http|https):\\/\\/[a-z0-9_]+([\\-\\.]{1}[a-z_0-9]+)*\\.[_a-z]{2,5}' . '((:[0-9]{1,5})?\\/.*)?$/i', $attributes['original'] ) ){
            $imageStore = $attributes['original'];
        } else {
            $imageStore = Storage::url( $attributes['original'] );
        }

        return $imageStore;
    }

    /**
     * Set public date attribute.
     *
     * @param Give $give Give model
     *
     * @return void
     */
    private function setDateForFrontEnd( Give $give )
    {
        $give->setAttribute( 'expired_date',
                             date( 'd', strtotime( $give->expired_date ) ) . ' ' .
                             date( 'F', strtotime( $give->expired_date ) ) . ' ' .
                             date( 'Y', strtotime( $give->expired_date ) )
        );
    }

    /**
     * Get give user item list.
     *
     * @param string  $userID  User ID
     * @param Request $request Request object
     *
     * @return LengthAwarePaginator Item list
     */
    public function getGiveUserItemList( string $userID, Request $request )
    {
        $type = $request->get( 'type' ) ? $request->get( 'type' ) : '';

        $builder = $this->with( [ 'giveImage' ] )
                        ->where( [ 'status' => 'public', 'fk_user_id' => $userID ] );

        if( $type ){
            $builder->where( [ 'type' => $type ] );
        }

        $data = Search::search( $builder, 'give', $request, [], '4' );

        return $this->transformGiveContent( $data );
    }

    /**
     * Creating give or receive item.
     *
     * @param Request $request Request object
     *
     * @return array Response information
     */
    public function createGive( Request $request )
    {

        if( $request->input( 'expired_date' ) ){
            $expiredDate = date( 'Y-m-d', strtotime( $request->input( 'expired_date' ) ) );
        }

        if( $request->input( 'useAddressProfile' ) === 'on' ){
            $result = DB::select( 'select address from users where id = ' . $request->input( 'fk_user_id' ) );
        }

        $newGive = [
            'type'                => $request->input( 'type' ),
            'fk_category_id'      => $request->input( 'fk_category_id' ),
            'title_thai'          => $request->input( 'name' ),
            'title_english'       => $request->input( 'name' ),
            'description_thai'    => $request->input( 'description_text' ),
            'description_english' => $request->input( 'description_text' ),
            'amount'              => $request->input( 'amount' ),
            'fk_user_id'          => $request->input( 'fk_user_id' ),
            'address'             => $request->input( 'address' ) ? $request->input( 'address' ) : $result[0]->address,
            'expired_date'        => $expiredDate,
            'status'              => 'public',
        ];

        $successForGive = $this->create( $newGive );

        if( $successForGive ){

            $successForGiveImage = '';

            if( $request->file( 'image_path' ) ){

                foreach( $request->file( 'image_path' ) as $imagePath ){

                    $imageInformation = $this->saveImage( $imagePath );

                    if( isset( $imageInformation['imageInformation']['original'] ) ){

                        $imagePathOriginal  = $imageInformation['imageInformation']['original'];
                        $imagePathThumbnail = $imageInformation['imageInformation']['thumbnail'];
                    }

                    $giveID = $successForGive->id;

                    $giveImageInformation = [
                        'original'   => $imagePathOriginal,
                        'thumbnail'  => $imagePathThumbnail,
                        'fk_give_id' => $giveID,
                    ];

                    $successForGiveImage = $this->giveImage()->updateOrCreate( [ 'fk_give_id' => $giveID ],
                                                                               $giveImageInformation );
                }
            }
        }

        return [ 'successForGive' => $successForGive, 'successForGiveImage' => $successForGiveImage ];
    }

    /**
     * Handle image upload from file browser.
     *
     * @param UploadedFile $imagePath UploadedFile object
     *
     * @return array Image saved result
     */
    private function saveImage( UploadedFile $imagePath )
    {
        $imageInformation = [];
        $file             = $imagePath;
        $success          = true;

        if( $file ){

            $imageInformation = Image::upload( $file, 'give' );
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
     * @param array $images Image's information
     *
     * @return    void
     */
    private function deleteImage( array $images )
    {
        $imagesFields = [ 'original', 'thumbnail' ];
        Image::deleteImage( $images, $imagesFields );
    }

    /**
     * Get give list.
     *
     * @param Request $request Request object
     *
     * @return LengthAwarePaginator List of give
     */
    public function getGiveAllListForAdmin( Request $request )
    {
        $builder = $this->with( [ 'giveCategory' ] )
                        ->where( 'type', 'give' )
                        ->orderBy( 'id', 'desc' );

        $data = Search::search( $builder, 'give', $request );

        return $this->transformGiveContent( $data );

    }

    /**
     * Get receive list.
     *
     * @param Request $request Request object
     *
     * @return LengthAwarePaginator List of receive
     */
    public function getReceiveAllListForAdmin( Request $request )
    {
        $builder = $this->with( [ 'giveCategory' ] )
                        ->where( 'type', 'receive' )
                        ->orderBy( 'id', 'desc' );

        $data = Search::search( $builder, 'give', $request );

        return $this->transformGiveContent( $data );

    }

    /**
     * Creating give for admin page.
     *
     * @param GiveRequest $request Request object
     *
     * @return array Creation response
     */
    public function createGiveForAdmin( GiveRequest $request )
    {

        if( $request->input( 'expired_date' ) ){
            $expiredDate = date( 'Y-m-d', strtotime( $request->input( 'expired_date' ) ) );
        }

        $newGive = [
            'type'                => $request->input( 'type' ),
            'fk_category_id'      => $request->input( 'fk_category_id' ),
            'title_thai'          => $request->input( 'title_thai' ),
            'title_english'       => $request->input( 'title_english' ),
            'description_thai'    => $request->input( 'description_thai' ),
            'description_english' => $request->input( 'description_english' ),
            'amount'              => $request->input( 'amount' ),
            'fk_user_id'          => $request->input( 'fk_user_id' ),
            'address'             => $request->input( 'address' ),
            'expired_date'        => $expiredDate,
            'status'              => $request->input( 'status' ) ? 'public' : 'draft',
        ];

        $successForGive = $this->create( $newGive );

        if( $successForGive ){

            $successForGiveImage = '';

            if( $request->file( 'image_path' ) ){

                foreach( $request->file( 'image_path' ) as $imagePath ){

                    $imageInformation = $this->saveImage( $imagePath );

                    if( isset( $imageInformation['imageInformation']['original'] ) ){

                        $imagePathOriginal  = $imageInformation['imageInformation']['original'];
                        $imagePathThumbnail = $imageInformation['imageInformation']['thumbnail'];
                    }

                    $giveID = $successForGive->id;

                    $giveImageInformation = [
                        'original'   => $imagePathOriginal,
                        'thumbnail'  => $imagePathThumbnail,
                        'fk_give_id' => $giveID,
                    ];

                    $successForGiveImage = $this->giveImage()->updateOrCreate( [ 'fk_give_id' => $giveID ],
                                                                               $giveImageInformation );
                }
            }
        }

        return [ 'successForGive' => $successForGive, 'successForGiveImage' => $successForGiveImage ];
    }

    /**
     * Updating give information.
     *
     * @param GiveRequest $request Give request object
     * @param Give        $give    Give model
     *
     * @return array Response information
     */
    public function updateGiveInformation( GiveRequest $request, Give $give )
    {

        if( $request->input( 'expired_date' ) ){
            $expiredDate = date( 'Y-m-d', strtotime( $request->input( 'expired_date' ) ) );
        }

        if( $request->input( 'useAddressProfile' ) === 'on' ){
            $result = DB::select( 'select address from users where id = ' . $request->input( 'fk_user_id' ) );
        }

        $data = [
            'type'                => $request->input( 'type' ),
            'fk_category_id'      => $request->input( 'fk_category_id' ),
            'title_thai'          => $request->input( 'title_thai' ),
            'title_english'       => $request->input( 'title_english' ),
            'description_thai'    => $request->input( 'description_thai' ),
            'description_english' => $request->input( 'description_english' ),
            'amount'              => $request->input( 'amount' ),
            'address'             => $request->input( 'address' ) ? $request->input( 'address' ) : $result[0]->address,
            'expired_date'        => $expiredDate,
            'status'              => $request->input( 'status' ) ? 'public' : 'draft',
        ];

        $successForGive = $this->where( 'id', $give->id )->update( $data );

        if( $successForGive ){

            $successForGiveImage = '';

            if( $request->file( 'image_path' ) ){

                DB::table( 'give_image' )->where( 'fk_give_id', $give->id )->delete();

                foreach( $request->file( 'image_path' ) as $imagePath ){

                    $imageInformation = $this->saveImage( $imagePath );

                    if( isset( $imageInformation['imageInformation']['original'] ) ){

                        $imagePathOriginal  = $imageInformation['imageInformation']['original'];
                        $imagePathThumbnail = $imageInformation['imageInformation']['thumbnail'];
                    }

                    $giveID = $give->id;

                    $giveImageInformation = [
                        'original'   => $imagePathOriginal,
                        'thumbnail'  => $imagePathThumbnail,
                        'fk_give_id' => $giveID,
                    ];

                    $successForGiveImage = $this->giveImage()->updateOrCreate( [ 'fk_give_id' => $giveID ],
                                                                               $giveImageInformation );
                }
            }
        }

        if( $successForGive || $successForGiveImage ){
            $response = [ 'success' => true, 'message' => __( 'give_admin.saved_give_success' ), ];
        } else {
            $response = [ 'success' => false, 'message' => __( 'give_admin.saved_give_error' ), ];
        }

        return $response;
    }

    /**
     * Delete give content.
     *
     * @return    bool|mixed|null    Deleted status
     */
    public function deleteGive()
    {
        $success = false;
        $images  = $this->getImages( $this );

        if( $images ){

            $this->deleteImage( $images );
            $success = $this->giveImage()->delete();

        }

        $success = $this->delete();

        return $success;
    }

    /**
     * Get a new image list into image store.
     *
     * @param Give $give Give model
     *
     * @return    array            Image store
     */
    public function getImages( Give $give )
    {
        $imageStore = [];

        foreach( $give->giveImage as $image ){

            $attributes = $image->getAttributes();

            array_push( $imageStore, [
                'id'                  => $attributes['id'],
                'fk_give_articles_id' => $attributes['fk_give_id'],
                'original'            => Storage::url( $attributes['original'] ),
                'thumbnail'           => Storage::url( $attributes['thumbnail'] ),
            ] );

        }

        return $imageStore;
    }
}
