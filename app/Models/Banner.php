<?php
/**
 * Banner Model
 */

namespace App\Models;

use App\Libraries\Utility;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    /** @var array A list of fields which are able to update in this model */
    protected $fillable = [];

    /** @var string Table name */
    protected $table = 'banner';

    /**
     * Get banner list.
     *
     * @return array A list of banner
     */
    public function getHomeBannerList()
    {
        $bannerList = $this->where( [ 'status' => 'public' ] )->orderBy( 'order', 'asc' )->get();
        $data       = $this->transformHomeBannerContent( $bannerList );

        return $data;
    }

    /**
     * Transform privilege banner information.
     *
     * @param Collection $homeBannerList A list of privilege
     *
     * @return Collection Home banner list for display
     */
    private function transformHomeBannerContent( Collection $homeBannerList )
    {
        foreach( $homeBannerList as $list ){
            $list->setAttribute( 'title', Utility::getLanguageFields( 'title', $list ) );
            $list->setAttribute( 'image_path', Utility::getLanguageFields( 'image_path', $list ) );
        }

        return $homeBannerList;
    }
}
