<?php
/**
 * Challenge Model
 */

namespace App\Models;

use App\Http\Requests\ChallengeRequest;
use App\Libraries\FileUpload;
use App\Libraries\Image;
use App\Libraries\Search;
use App\Libraries\Utility;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class Challenge extends Model
{
    /** @var array A list of fields which are able to update in this model */
    protected $fillable = [ 'fk_user_id', 'fk_category_id', 'title_thai', 'title_english',
                            'description_thai', 'description_english', 'content_thai', 'content_english',
                            'file_path', 'view', 'status', ];

    /** @var string Table name */
    protected $table = 'challenge';

    /**
     * Get challenge category model relationship.
     *
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo Challenge category model relationship
     */
    public function challengeCategory()
    {
        return $this->belongsTo( 'App\Models\ChallengeCategory', 'fk_category_id' );
    }

    /**
     * Get challenge image model relationship.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany ChallengeImage model relationship
     */
    public function challengeImage()
    {
        return $this->HasMany( 'App\Models\ChallengeImage', 'fk_challenge_id' );
    }

    /**
     * Get challenge comment model relationship.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany ChallengeComment model relationship
     */
    public function challengeComment()
    {
        return $this->HasMany( 'App\Models\ChallengeComment', 'fk_challenge_id' );
    }

    /**
     * Get challenge like model relationship.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany ChallengeLike model relationship
     */
    public function challengeLike()
    {
        return $this->HasMany( 'App\Models\ChallengeLike', 'fk_challenge_id' );
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
     * Get a list of challenge for displaying.
     *
     * @param Request $request Challenge request object
     * @param string  $limit   Limit number
     *
     * @return LengthAwarePaginator A list of challenge for home page
     */
    public function getChallengeList( Request $request, $limit = '3' )
    {
        $builder = $this->with( [ 'challengeImage' ] )
                        ->with( [ 'challengeComment' ] )
                        ->with( [ 'challengeLike' ] )
                        ->with( [ 'users' ] )->where( 'status', 'public' );

        $data = Search::search( $builder, 'challenge', $request, [], $limit );

        return $this->transformHomeChallengeContent( $data );
    }

    /**
     * Transform challenge information.
     *
     * @param LengthAwarePaginator $homeChallengeList A list of challenge
     *
     * @return LengthAwarePaginator Home challenge list for display
     */
    private function transformHomeChallengeContent( LengthAwarePaginator $homeChallengeList )
    {
        foreach( $homeChallengeList as $list ){
            $list->setAttribute( 'title', Utility::getLanguageFields( 'title', $list ) );
            $list->setAttribute( 'image_path', $this->getImages( $list ) );
            $list->setAttribute( 'category_title', Utility::getLanguageFields( 'title', $list->challengeCategory ) );
            $this->setPublicDateForFrontEnd( $list );
        }

        return $homeChallengeList;
    }

    /**
     * Set public date attribute.
     *
     * @param Challenge $challenge Challenge model
     *
     * @return void
     */
    private function setPublicDateForFrontEnd( Challenge $challenge )
    {
        $challenge->setAttribute( 'public_date',
                                  date( 'd', strtotime( $challenge->created_at ) ) . ' ' .
                                  date( 'F', strtotime( $challenge->created_at ) ) . ' ' .
                                  date( 'Y', strtotime( $challenge->created_at ) )
        );
    }

    /**
     * Get a new image list into an image store.
     *
     * @param Challenge $challenge Challenge model
     * @param string    $imageSize Image size
     *
     * @return array Image store
     */
    public function getImages( Challenge $challenge, string $imageSize = 'original' )
    {
        $imageStore = [];

        foreach( $challenge->challengeImage as $image ){
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
     * Get challenge all list.
     *
     * @param Request $request Request object
     * @param string  $limit   Limit number
     *
     * @return LengthAwarePaginator List of challenge
     */
    public function getChallengeAllList( Request $request, string $limit = '' )
    {
        $builder = $this->with( [ 'challengeImage' ] )
                        ->with( [ 'challengeComment' ] )
                        ->with( [ 'challengeLike' ] )
                        ->with( [ 'users' ] )
                        ->orderBy( 'id', 'desc' )
                        ->where( 'status', 'public' );

        $data = Search::search( $builder, 'challenge', $request, [], $limit );

        return $this->transformChallengeContent( $data );
    }

    /**
     * Get challenge detail information.
     *
     * @param Challenge $challenge Challenge model
     *
     * @return Challenge challenge detail
     */
    public function getChallengeDetail( Challenge $challenge )
    {
        $challenge = $this->with( [ 'challengeImage' ] )
                          ->with( [ 'challengeComment' ] )
                          ->with( [ 'challengeLike' ] )
                          ->with( [ 'users' ] )
                          ->where( [ 'id' => $challenge->id ] )->first();

        if( $challenge ){
            $challenge->setAttribute( 'title', Utility::getLanguageFields( 'title', $challenge ) );
            $challenge->setAttribute( 'content', Utility::getLanguageFields( 'content', $challenge ) );
            $challenge->setAttribute( 'image_path', Utility::getImages( $challenge['file_path'] ) );
            $challenge->setAttribute( 'username', $challenge->users['username'] );
            $this->setPublicDateForFrontEnd( $challenge );

            foreach( $challenge->challengeImage as $challenge_image ){
                $challenge_image->setAttribute( 'alt', Utility::getLanguageFields( 'alt', $challenge_image ) );
            }
        }

        return $challenge;
    }

    /**
     * Transform challenge information.
     *
     * @param LengthAwarePaginator $challengeList A list of challenge
     *
     * @return LengthAwarePaginator Challenge list for display
     */
    private function transformChallengeContent( LengthAwarePaginator $ChallengeList )
    {
        foreach( $ChallengeList as $list ){
            $list->setAttribute( 'title', Utility::getLanguageFields( 'title', $list ) );
            $list->setAttribute( 'description', Utility::getLanguageFields( 'description', $list ) );
            $list->setAttribute( 'image_path', $this->getImages( $list ) );
            $this->setPublicDateForFrontEnd( $list );
        }

        return $ChallengeList;
    }

    /**
     * Updating challenge information.
     *
     * @param ChallengeRequest $request   Challenge request object
     * @param Challenge        $challenge Challenge model
     *
     * @return array Response information
     */
    public function updateChallengeInformation( ChallengeRequest $request, Challenge $challenge )
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

        $successForChallenge = $this->where( 'id', $challenge->id )->update( $data );

        if( $successForChallenge ){

            $successForChallengeImage = '';

            if( $request->file( 'image_path' ) ){

                DB::table( 'challenge_image' )->where( 'fk_challenge_id', $challenge->id )->delete();

                foreach( $request->file( 'image_path' ) as $imagePath ){

                    $imageInformation = $this->saveImage( $imagePath );

                    if( isset( $imageInformation['imageInformation']['original'] ) ){
                        $image_path_original  = $imageInformation['imageInformation']['original'];
                        $image_path_thumbnail = $imageInformation['imageInformation']['thumbnail'];
                    }

                    $challengeID = $challenge->id;

                    $challengeImageInformation = [
                        'original'        => $image_path_original,
                        'thumbnail'       => $image_path_thumbnail,
                        'fk_challenge_id' => $challengeID,
                    ];

                    $successForChallengeImage = $this->challengeImage()->updateOrCreate( [ 'fk_challenge_id' => $challengeID ],
                                                                                         $challengeImageInformation );
                }
            }
        }

        if( $successForChallenge || $successForChallengeImage ){
            $response = [ 'success' => true, 'message' => __( 'challenge_admin.saved_challenge_success' ), ];
        } else {
            $response = [ 'success' => false, 'message' => __( 'challenge_admin.saved_challenge_error' ), ];
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

            $imageInformation = FileUpload::upload( $file[0], 'challenge' );
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

            $imageInformation = Image::upload( $file, 'challenge' );
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
     * Get a challenge image list into an image store.
     *
     * @param ChallengeImage $challengeImage Challenge model
     *
     * @return array Image store
     */
    public function getChallengeImages( ChallengeImage $challengeImage )
    {

        $attributes = $challengeImage->getAttributes();

        if( preg_match( '/^(http|https):\\/\\/[a-z0-9_]+([\\-\\.]{1}[a-z_0-9]+)*\\.[_a-z]{2,5}' . '((:[0-9]{1,5})?\\/.*)?$/i', $attributes['original'] ) ){
            $imageStore = $attributes['original'];
        } else {
            $imageStore = Storage::url( $attributes['original'] );
        }

        return $imageStore;
    }

    /**
     * Get challenge all list for admin.
     *
     * @param Request $request Request Object
     *
     * @return LengthAwarePaginator list of challenge
     */
    public function getChallengeAllListForAdmin( Request $request )
    {
        $builder = $this->with( [ 'challengeImage' ] )
                        ->with( [ 'challengeComment' ] )
                        ->with( [ 'challengeLike' ] )
                        ->with( [ 'users' ] )
                        ->orderBy( 'id', 'desc' );

        $data = Search::search( $builder, 'challenge', $request );

        return $this->transformChallengeContent( $data );

    }

    /**
     * Create challenge information.
     *
     * @param ChallengeRequest $request Challenge request object
     *
     * @return array Response information
     */
    public function createChallengeForAdmin( ChallengeRequest $request )
    {
        $file_path       = '';
        $fileInformation = $this->saveFile( $request );

        if( isset( $fileInformation['fileInformation']['file_path'] ) ){
            $file_path = $fileInformation['fileInformation']['file_path'];
        }
        $newChallenge = [
            'title_english'       => $request->input( 'title_english' ),
            'title_thai'          => $request->input( 'title_thai' ),
            'description_english' => $request->input( 'description_english' ),
            'description_thai'    => $request->input( 'description_thai' ),
            'content_english'     => $request->input( 'content_english' ),
            'content_thai'        => $request->input( 'content_thai' ),
            'file_path'           => $file_path,
            'fk_user_id'          => $request->input( 'fk_user_id' ),
            'view'                => '0',
            'status'              => $request->input( 'status' ) ? 'public' : 'draft',
        ];

        $successForChallenge = $this->create( $newChallenge );

        if( $successForChallenge ){
            $successForChallengeImage = '';
            if( $request->file( 'image_path' ) ){

                foreach( $request->file( 'image_path' ) as $imagePath ){

                    $imageInformation = $this->saveImage( $imagePath );

                    if( isset( $imageInformation['imageInformation']['original'] ) ){
                        $image_path_original  = $imageInformation['imageInformation']['original'];
                        $image_path_thumbnail = $imageInformation['imageInformation']['thumbnail'];
                    }

                    $challengeID = $successForChallenge->id;

                    $challengeImageInformation = [
                        'original'        => $image_path_original,
                        'thumbnail'       => $image_path_thumbnail,
                        'fk_challenge_id' => $challengeID,
                    ];

                    $successForChallengeImage = $this->challengeImage()->updateOrCreate( [ 'fk_challenge_id' => $challengeID ],
                                                                                         $challengeImageInformation );
                }
            }
        }

        return [ 'successForChallenge' => $successForChallenge, 'successForChallengeImage' => $successForChallengeImage ];
    }

    /**
     * Delete challenge content.
     *
     * @return    bool|mixed|null    Deleted status
     */
    public function deleteChallenge()
    {
        $success = false;
        $images  = $this->getImages( $this );

        if( $images ){
            $this->deleteChallengeImage( $images );
            $this->challengeImage()->delete();
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
    private function deleteChallengeImage( array $images )
    {
        $imagesFields = [ 'original', 'thumbnail' ];
        Image::deleteImage( $images, $imagesFields );
    }

}
