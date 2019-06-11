<?php
/**
 * Challenge Model
 */

namespace App\Models;

use App\Libraries\Search;
use App\Libraries\Utility;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Storage;

class Challenge extends Model
{
    /** @var array A list of fields which are able to update in this model */
    protected $fillable = [ 'fk_user_id', 'fk_category_id', 'title_thai', 'title_english',
                            'description_thai', 'description_english', 'file_path', 'view', 'status', ];

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
     * @param Request $request Request Object
     *
     * @return LengthAwarePaginator list of challenge
     */
    /**
     * Get challenge all list.
     *
     * @param Request $request
     * @param string  $limit
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
}
