<?php
/**
 * Share Model
 */

namespace App\Models;

use App\Libraries\FileUpload;
use App\Libraries\Image;
use App\Libraries\Search;
use App\Libraries\Utility;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;
use App\Http\Requests\ShareRequest;

class Share extends Model
{
    /** @var array A list of fields which are able to update in this model */
    protected $fillable = [ 'fk_user_id', 'fk_category_id', 'title_thai', 'title_english',
                            'description_thai', 'description_english', 'content_thai', 'content_english',
                            'file_path', 'view', 'status', ];

    /** @var string Table name */
    protected $table = 'share';

    /**
     * Get share category model relationship.
     *
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo Share category model relationship
     */
    public function shareCategory()
    {
        return $this->belongsTo( 'App\Models\ShareCategory', 'fk_category_id' );
    }

    /**
     * Get share image model relationship.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany ShareImage model relationship
     */
    public function shareImage()
    {
        return $this->HasMany( 'App\Models\ShareImage', 'fk_share_id' );
    }

    /**
     * Get share comment model relationship.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany ShareComment model relationship
     */
    public function shareComment()
    {
        return $this->HasMany( 'App\Models\ShareComment', 'fk_share_id' )->where( 'status', 'public' );
    }

    /**
     * Get share like model relationship.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany ShareLike model relationship
     */
    public function shareLike()
    {
        return $this->HasMany( 'App\Models\ShareLike', 'fk_share_id' );
    }

    /**
     * Get user model relationship.
     *
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo User model relationship
     */
    public function users()
    {
        return $this->belongsTo( 'App\Models\Users', 'fk_user_id' );
    }

    /**
     * Get share interest in model relationship.
     *
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo Share interest in model relationship
     */
    public function shareInterestIn()
    {
        return $this->belongsTo( 'App\Models\ShareInterestIn', 'fk_share_id' );
    }

    /**
     * Get a list of share for displaying.
     *
     * @param Request $request Share request object
     *
     * @return LengthAwarePaginator A list of share for home page
     */
    public function getHomeShareList( Request $request )
    {
        $builder = $this->with( [ 'shareImage' ] )
                        ->with( [ 'shareComment' ] )
                        ->with( [ 'shareLike' ] )
                        ->with( [ 'users' ] )
                        ->where( 'status', 'public' );

        $data = Search::search( $builder, 'share', $request, [], '6' );

        return $this->transformShareContent( $data );

    }

    /**
     * Transform share information.
     *
     * @param LengthAwarePaginator $homeShareList A list of share
     *
     * @return LengthAwarePaginator Home share list for display
     */
    private function transformShareContent( LengthAwarePaginator $homeShareList )
    {
        foreach( $homeShareList as $list ){
            $list->setAttribute( 'title', Utility::getLanguageFields( 'title', $list ) );
            foreach( $list->shareImage as $share_image ){
                $share_image->setAttribute( 'image_path', $this->getShareImages( $share_image, 'original' ) );
                $share_image->setAttribute( 'thumbnail_path', $this->getShareImages( $share_image, 'thumbnail' ) );
                $share_image->setAttribute( 'alt', Utility::getLanguageFields( 'alt', $share_image ) );
            }
            $this->setPublicDateForFrontEnd( $list );

        }

        return $homeShareList;
    }

    /**
     * Set public date attribute.
     *
     * @param Share $share Share model
     *
     * @return void
     */
    private function setPublicDateForFrontEnd( Share $share )
    {
        $share->setAttribute( 'public_date',
                              date( 'd', strtotime( $share->created_at ) ) . ' ' .
                              date( 'F', strtotime( $share->created_at ) ) . ' ' .
                              date( 'Y', strtotime( $share->created_at ) )
        );
    }

    /**
     * Get a new image list into an image store.
     *
     * @param Share  $share     Share model
     * @param string $imageSize Image size
     *
     * @return array Image store
     */
    public function getImages( Share $share, string $imageSize = 'original' )
    {
        $imageStore = [];

        foreach( $share->shareImage as $image ){

            $attributes = $image->getAttributes();

            array_push( $imageStore, [
                'id'          => $attributes['id'],
                'fk_share_id' => $attributes['fk_share_id'],
                'original'    => Storage::url( $attributes['original'] ),
                'thumbnail'   => Storage::url( $attributes['thumbnail'] ),
            ] );

        }

        return $imageStore;
    }

    /**
     * Get share all list.
     *
     * @param Request $request Request Object
     * @param string  $limit   Limit of content
     *
     * @return LengthAwarePaginator list of share
     */
    public function getShareAllList( Request $request, string $limit = '' )
    {
        $builder = $this->with( [ 'shareImage' ] )
                        ->with( [ 'shareComment' ] )
                        ->with( [ 'shareLike' ] )
                        ->with( [ 'users' ] )
                        ->orderBy( 'id', 'desc' )
                        ->where( 'status', 'public' );

        $data = Search::search( $builder, 'share', $request, [], $limit );

        return $this->transformShareContent( $data );
    }

    /**
     * Get share detail information.
     *
     * @param Share $share Share model
     *
     * @return Share share detail
     */
    public function getShareDetail( Share $share )
    {
        $share = $this->with( [ 'shareImage' ] )
                      ->with( [ 'shareComment' ] )
                      ->with( [ 'shareLike' ] )
                      ->with( [ 'users' ] )
                      ->where( [ 'id' => $share->id, 'status' => 'public' ] )->first();

        if( $share ){
            $share->setAttribute( 'title', Utility::getLanguageFields( 'title', $share ) );
            $share->setAttribute( 'content', Utility::getLanguageFields( 'content', $share ) );
            $share->setAttribute( 'username', $share->users['username'] );
            $this->setPublicDateForFrontEnd( $share );
            foreach( $share->shareImage as $share_image ){
                $share_image->setAttribute( 'image_path', $this->getShareImages( $share_image, 'original' ) );
                $share_image->setAttribute( 'alt', Utility::getLanguageFields( 'alt', $share_image ) );
            }
        }

        return $share;
    }

    /**
     * Creating share item.
     *
     * @param Request $request Request object
     *
     * @return array Response information
     */
    public function createShare( Request $request )
    {
        $file_path       = '';
        $fileInformation = $this->saveFile( $request );

        if( isset( $fileInformation['fileInformation']['file_path'] ) ){
            $file_path = $fileInformation['fileInformation']['file_path'];
        }
        $newShare = [
            'title_english'   => $request->input( 'title_english' ),
            'title_thai'      => $request->input( 'title_english' ),
            'content_english' => $request->input( 'content_english' ),
            'content_thai'    => $request->input( 'content_english' ),
            'file_path'       => $file_path,
            'fk_user_id'      => $request->input( 'fk_user_id' ),
            'status'          => 'public',
        ];

        $successForShare = $this->create( $newShare );

        if( $successForShare ){
            $successForShareImage = '';
            if( $request->file( 'image_path' ) ){

                foreach( $request->file( 'image_path' ) as $imagePath ){

                    $imageInformation = $this->saveImage( $imagePath );

                    if( isset( $imageInformation['imageInformation']['original'] ) ){
                        $image_path_original  = $imageInformation['imageInformation']['original'];
                        $image_path_thumbnail = $imageInformation['imageInformation']['thumbnail'];
                    }

                    $shareID = $successForShare->id;

                    $shareImageInformation = [
                        'original'    => $image_path_original,
                        'thumbnail'   => $image_path_thumbnail,
                        'fk_share_id' => $shareID,
                    ];

                    $successForShareImage = $this->shareImage()->updateOrCreate( [ 'fk_share_id' => $shareID ],
                                                                                 $shareImageInformation );
                }
            }
        }

        return [ 'successForShare' => $successForShare, 'successForShareImage' => $successForShareImage ];

    }

    /**
     * Updating share information.
     *
     * @param ShareRequest $request Share request object
     * @param Share        $share   Share model
     *
     * @return array Response information
     */
    public function updateShareInformation( ShareRequest $request, Share $share )
    {

        $file_path = '';

        $data = [
            'title_english'       => $request->input( 'title_english' ),
            'title_thai'          => $request->input( 'title_thai' ),
            'description_english' => $request->input( 'description_english' ),
            'description_thai'    => $request->input( 'description_thai' ),
            'content_english'     => $request->input( 'content_english' ),
            'content_thai'        => $request->input( 'content_thai' ),
            'status'              => $request->input( 'status' ) ? 'public' : 'draft',
        ];

        if( $request->file( 'file_path' ) ){

            $fileInformation   = $this->saveFile( $request );
            $data['file_path'] = $fileInformation['fileInformation']['file_path'];
        }

        $successForShare = $this->where( 'id', $share->id )->update( $data );

        if( $successForShare ){

            $successForShareImage = '';

            if( $request->file( 'image_path' ) ){

                DB::table( 'share_image' )->where( 'fk_share_id', $share->id )->delete();

                foreach( $request->file( 'image_path' ) as $imagePath ){

                    $imageInformation = $this->saveImage( $imagePath );

                    if( isset( $imageInformation['imageInformation']['original'] ) ){
                        $image_path_original  = $imageInformation['imageInformation']['original'];
                        $image_path_thumbnail = $imageInformation['imageInformation']['thumbnail'];
                    }

                    $shareID = $share->id;

                    $shareImageInformation = [
                        'original'    => $image_path_original,
                        'thumbnail'   => $image_path_thumbnail,
                        'fk_share_id' => $shareID,
                    ];

                    $successForShareImage = $this->shareImage()->updateOrCreate( [ 'fk_share_id' => $shareID ],
                                                                                 $shareImageInformation );
                }
            }
        }

        if( $successForShare || $successForShareImage ){
            $response = [ 'success' => true, 'message' => __( 'share_admin.saved_share_success' ), ];
        } else {
            $response = [ 'success' => false, 'message' => __( 'share_admin.saved_share_error' ), ];
        }

        return $response;

    }

    /**
     * Handle image upload from file browser.
     *
     * @param Request $request Request object
     *
     * @return array Image saved result
     */
    private function saveFile( Request $request )
    {
        $imageInformation = [];
        $file             = $request->file( 'file_path' );
        $success          = true;
        if( $file ){

            $imageInformation = FileUpload::upload( $file[0], 'share' );
            $success          = ( count( $imageInformation ) ) ? true : false;

            if( $this->id ){
                $this->deleteImage();
            }

        }

        return [ 'success' => $success, 'fileInformation' => $imageInformation ];
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

            $imageInformation = Image::upload( $file, 'share' );
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
     * Get a share image list into an image store.
     *
     * @param ShareImage $shareImage Share model
     *
     * @return array Image store
     */
    public function getShareImages( ShareImage $shareImage, $imageSize )
    {

        $attributes = $shareImage->getAttributes();

        if( preg_match( '/^(http|https):\\/\\/[a-z0-9_]+([\\-\\.]{1}[a-z_0-9]+)*\\.[_a-z]{2,5}' . '((:[0-9]{1,5})?\\/.*)?$/i', $attributes['original'] ) ){
            $imageStore = $attributes['original'];
        } else {
            $imageStore = Storage::url( $attributes[ $imageSize ] );
        }

        return $imageStore;
    }

    /**
     * Get share all list for admin.
     *
     * @param Request $request Request Object
     *
     * @return LengthAwarePaginator list of share
     */
    public function getShareAllListForAdmin( Request $request )
    {
        $builder = $this->with( [ 'shareImage' ] )
                        ->with( [ 'shareComment' ] )
                        ->with( [ 'shareLike' ] )
                        ->with( [ 'users' ] )
                        ->orderBy( 'id', 'desc' );

        $data = Search::search( $builder, 'share', $request );

        return $this->transformShareContent( $data );

    }

    /**
     * Create share information.
     *
     * @param ShareRequest $request Share request object
     *
     * @return array Response information
     */
    public function createShareForAdmin( ShareRequest $request )
    {
        $file_path       = '';
        $fileInformation = $this->saveFile( $request );

        if( isset( $fileInformation['fileInformation']['file_path'] ) ){
            $file_path = $fileInformation['fileInformation']['file_path'];
        }
        $newShare = [
            'title_english'       => $request->input( 'title_english' ),
            'title_thai'          => $request->input( 'title_thai' ),
            'description_english' => $request->input( 'description_english' ),
            'description_thai'    => $request->input( 'description_thai' ),
            'content_english'     => $request->input( 'content_english' ),
            'content_thai'        => $request->input( 'content_thai' ),
            'file_path'           => $file_path,
            'fk_user_id'          => $request->input( 'fk_user_id' ),
            'status'              => $request->input( 'status' ) ? 'public' : 'draft',
        ];

        $successForShare = $this->create( $newShare );

        if( $request->input( 'fk_interest_in_id' ) ){
            foreach( $request->input( 'fk_interest_in_id' ) as $interestID ){
                $this->shareInterestIn()->create( [
                                                      'fk_interest_in_id' => $interestID,
                                                      'id'                => $successForShare->id,
                                                  ] );
            }
        }

        if( $successForShare ){
            $successForShareImage = '';
            if( $request->file( 'image_path' ) ){

                foreach( $request->file( 'image_path' ) as $imagePath ){

                    $imageInformation = $this->saveImage( $imagePath );

                    if( isset( $imageInformation['imageInformation']['original'] ) ){
                        $image_path_original  = $imageInformation['imageInformation']['original'];
                        $image_path_thumbnail = $imageInformation['imageInformation']['thumbnail'];
                    }

                    $shareID = $successForShare->id;

                    $shareImageInformation = [
                        'original'    => $image_path_original,
                        'thumbnail'   => $image_path_thumbnail,
                        'fk_share_id' => $shareID,
                    ];

                    $successForShareImage = $this->shareImage()->updateOrCreate( [ 'fk_share_id' => $shareID ],
                                                                                 $shareImageInformation );
                }
            }
        }

        return [ 'successForShare' => $successForShare, 'successForShareImage' => $successForShareImage ];
    }

    /**
     * Delete share content.
     *
     * @return    bool|mixed|null    Deleted status
     */
    public function deleteShare()
    {
        $success = false;
        $images  = $this->getImages( $this );
        $this->shareComment()->delete();
        $this->shareLike()->delete();
        if( $images ){
            $this->shareImage()->delete();
        }

        $success = $this->delete();

        return $success;
    }

    /**
     * Delete an uploaded image.
     *
     * @param array $images Image's information
     *
     * @return    void
     */
    private function deleteShareImage( array $images )
    {
        $imagesFields = [ 'original', 'thumbnail' ];
        Image::deleteImage( $images, $imagesFields );
    }

}
