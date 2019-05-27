<?php
/**
 * Share Model
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

class Share extends Model
{
    /** @var array A list of fields which are able to update in this model */
    protected $fillable = [ 'fk_user_id', 'fk_category_id', 'title_thai', 'title_english',
                            'description_thai', 'description_english', 'file_path', 'view', 'status', ];

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
        return $this->HasMany( 'App\Models\ShareComment', 'fk_share_id' );
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
        return $this->belongsTo( 'App\Models\users', 'fk_user_id' );
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
                      ->with( [ 'users' ] )->where( 'status', 'public' );

        $data  = Search::search( $builder, 'learn', $request, [], '6' );

        return $this->transformHomeShareContent( $data );

    }

    /**
     * Transform share information.
     *
     * @param LengthAwarePaginator $homeShareList A list of share
     *
     * @return LengthAwarePaginator Home share list for display
     */
    private function transformHomeShareContent( LengthAwarePaginator $homeShareList )
    {
        foreach( $homeShareList as $list ){
            $list->setAttribute( 'title', Utility::getLanguageFields( 'title', $list ) );
            $list->setAttribute( 'image_path', $this->getImages( $list ) );
            $list->setAttribute( 'category_title', Utility::getLanguageFields( 'title', $list->shareCategory ) );
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
                              date( 'd', strtotime( $share->public_date ) ) . ' ' .
                              date( 'F', strtotime( $share->public_date ) ) . ' ' .
                              date( 'Y', strtotime( $share->public_date ) )
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
        $imageStore = '';
        foreach( $share->shareImage as $image ){

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
