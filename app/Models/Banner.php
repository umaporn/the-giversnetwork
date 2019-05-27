<?php
/**
 * Banner Model
 */

namespace App\Models;

use App\Libraries\Search;
use App\Libraries\Utility;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class Banner extends Model
{
    /** @var array A list of fields which are able to update in this model */
    protected $fillable = [];

    /** @var string Table name */
    protected $table = 'banner';

    /**
     * Get banner list.
     *
     * @return LengthAwarePaginator A list of banner
     */
    public function getHomeBannerList( Request $request )
    {
        $builder = $this->where( [ 'status' => 'public' ] )->orderBy( 'order', 'asc' );

        $data = Search::search( $builder, 'banner', $request );

        return $this->transformHomeBannerContent( $data );

    }

    /**
     * Transform privilege banner information.
     *
     * @param LengthAwarePaginator $homeBannerList A list of privilege
     *
     * @return LengthAwarePaginator Home banner list for display
     */
    private function transformHomeBannerContent( LengthAwarePaginator $homeBannerList )
    {
        foreach( $homeBannerList as $list ){
            $list->setAttribute( 'title', Utility::getLanguageFields( 'title', $list ) );
            $list->setAttribute( 'image_path', Utility::getLanguageFields( 'image_path', $list ) );
        }

        return $homeBannerList;
    }
}
