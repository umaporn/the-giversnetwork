<?php
/**
 * Give Model
 */

namespace App\Models;

use App\Libraries\Utility;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
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
     * Get a list of give for displaying.
     *
     * @param Request $request Give request object
     *
     * @return Collection A list of give for home page
     */
    public function getHomeGiveList( string $id = '1' )
    {
        $query = $this->with( [ 'giveImage' ] )->where( [ 'status' => 'public', 'type' => 'give' ] )->limit( 9 );

        if( $id ){
            $query->where( [ 'fk_category_id' => $id ] );
        } else {
            $query->where( [ 'fk_category_id' => 1 ] );
        }

        return $this->transformHomeGiveContent( $query->get() );
    }

    /**
     * Transform give information.
     *
     * @param Collection $homeGiveList A list of give
     *
     * @return Collection Home give list for display
     */
    private function transformHomeGiveContent( Collection $homeGiveList )
    {
        foreach( $homeGiveList as $list ){
            $list->setAttribute( 'title', Utility::getLanguageFields( 'title', $list ) );
            $list->setAttribute( 'category_title', Utility::getLanguageFields( 'title', $list->giveCategory ) );
            $list->setAttribute( 'image_path', $this->getFirstImages( $list ) );
            $this->setExpiredDateForFrontEnd( $list );
        }

        return $homeGiveList;
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
}
