<?php
/**
 * Learn Model
 */

namespace App\Models;

use App\Libraries\Utility;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Learn extends Model
{
    /** @var array A list of fields which are able to update in this model */
    protected $fillable = [];

    /** @var string Table name */
    protected $table = 'learn';

    /**
     * Get learn category model relationship.
     *
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo Learn category model relationship
     */
    public function learnCategory()
    {
        return $this->belongsTo( 'App\Models\LearnCategory', 'fk_category_id' );
    }

    /**
     * Get a list of learn for displaying.
     *
     * @param Request $request Learn request object
     *
     * @return Collection A list of learn for home page
     */
    public function getHomeLearnList()
    {
        $query = $this->with( [ 'learnCategory' ] )->limit( 3 )->where( 'status', 'public' )->get();

        $data = $this->transformHomeLearnContent( $query );

        return $data;
    }

    /**
     * Transform learn information.
     *
     * @param Collection $homeLearnList A list of learn
     *
     * @return Collection Home learn list for display
     */
    private function transformHomeLearnContent( Collection $homeLearnList )
    {
        foreach( $homeLearnList as $list ){
            $list->setAttribute( 'title', Utility::getLanguageFields( 'title', $list ) );
            $list->setAttribute( 'category_title', Utility::getLanguageFields( 'title', $list->learnCategory ) );
            $this->setPublicDateForFrontEnd( $list );
        }

        return $homeLearnList;
    }

    /**
     * Set public date attribute.
     *
     * @param Learn $learn Learn model
     *
     * @return void
     */
    private function setPublicDateForFrontEnd( Learn $learn )
    {
        $learn->setAttribute( 'public_date',
                              date( 'd', strtotime( $learn->public_date ) ) . ' ' .
                              date( 'F', strtotime( $learn->public_date ) ) . ' ' .
                              date( 'Y', strtotime( $learn->public_date ) )
        );
    }
}
