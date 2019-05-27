<?php
/**
 * Challenge Model
 */

namespace App\Models;

use App\Libraries\Search;
use App\Libraries\Utility;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\App;
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
        return $this->belongsTo( 'App\Models\users', 'fk_user_id' );
    }

    /**
     * Get a list of challenge for displaying.
     *
     * @param Request $request Challenge request object
     *
     * @return LengthAwarePaginator A list of challenge for home page
     */
    public function getHomeChallengeList( Request $request )
    {
        $builder = $this->with( [ 'challengeImage' ] )
                        ->with( [ 'challengeComment' ] )
                        ->with( [ 'challengeLike' ] )
                        ->with( [ 'users' ] )->where( 'status', 'public' );

        $data = Search::search( $builder, 'challenge', $request, [], '3' );

        return $this->transformHomeChallengeContent( $data );
    }

    /**
     * Transform share information.
     *
     * @param LengthAwarePaginator $homeShareList A list of share
     *
     * @return LengthAwarePaginator Home share list for display
     */
    private function transformHomeChallengeContent( LengthAwarePaginator $homeChallengeList )
    {
        foreach( $homeChallengeList as $list ){
            $list->setAttribute( 'title', Utility::getLanguageFields( 'title', $list ) );
            $list->setAttribute( 'images_path', $this->getImages( $list ) );
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
                                  date( 'd', strtotime( $challenge->public_date ) ) . ' ' .
                                  date( 'F', strtotime( $challenge->public_date ) ) . ' ' .
                                  date( 'Y', strtotime( $challenge->public_date ) )
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
}
