<?php
/**
 * Give Model
 */

namespace App\Models;

use App\Libraries\Search;
use App\Libraries\Utility;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Storage;

class Give extends Model
{
    /** @var array A list of fields which are able to update in this model */
    protected $fillable = [];

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
     * @param Request $request Give request object
     *
     * @return LengthAwarePaginator A list of give for home page
     */
    /**
     * Get a list of give for displaying.
     *
     * @param string  $id      Category id
     * @param Request $request Request object
     *
     * @return LengthAwarePaginator
     */
    public function getHomeGiveList( string $id, Request $request )
    {
        $builder = $this->with( [ 'giveImage' ] )
                        ->where( [ 'status' => 'public', 'type' => 'give' ] );

        if( $id ){
            $builder->where( [ 'fk_category_id' => $id ] );
        }

        $data = Search::search( $builder, 'give', $request, [], '9' );

        return $this->transformGiveContent( $data );
    }

    /**
     * Transform give information.
     *
     * @param Collection $giveList A list of give
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
        $type           = $request->get( 'type' ) ? $request->get( 'type' ) : 'give';
        $fk_category_id = $request->get( 'category_id' ) ? $request->get( 'category_id' ) : '';

        $builder = $this->with( [ 'giveCategory' ] )
                        ->orderBy( 'id', 'desc' )
                        ->where( [ 'status' => 'public', 'type' => $type ] );

        if( $fk_category_id ){
            $builder->where( [ 'fk_category_id' => $fk_category_id ] );
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
            $give->setAttribute( 'content', Utility::getLanguageFields( 'content', $give ) );
            $give->setAttribute( 'category_title', Utility::getLanguageFields( 'title', $give->giveCategory ) );
            $give->setAttribute( 'category_title', Utility::getLanguageFields( 'title', $give->giveCategory ) );
            $this->setDateForFrontEnd( $give );
            foreach( $give->giveImage as $give_image ){
                $give_image->setAttribute( 'alt', Utility::getLanguageFields( 'alt', $give_image ) );
            }
        }

        return $give;
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

    public function getGiveUserItemList( string $userID, Request $request )
    {
        $builder = $this->with( [ 'giveImage' ] )
                     ->where( [ 'status' => 'public', 'type' => 'give', 'fk_user_id' => $userID ] );

        $data = Search::search( $builder, 'give', $request, [], '4' );

        return $this->transformGiveContent( $data );
    }

}
