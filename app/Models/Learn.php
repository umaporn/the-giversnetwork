<?php
/**
 * Learn Model
 */

namespace App\Models;

use App\Libraries\Search;
use App\Libraries\Utility;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

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
     * @return LengthAwarePaginator A list of learn for home page
     */
    public function getHomeLearnList( Request $request )
    {
        $builder = $this->with( [ 'learnCategory' ] )->where( 'status', 'public' );

        $data = Search::search( $builder, 'learn', $request, [], '3' );

        return $this->transformLearnContent( $data );
    }

    /**
     * Transform learn information.
     *
     * @param LengthAwarePaginator $homeLearnList A list of learn
     *
     * @return LengthAwarePaginator Home learn list for display
     */
    private function transformLearnContent( LengthAwarePaginator $homeLearnList )
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

    /**
     * Get a list of most popular learn.
     *
     * @param Request $request Request object
     *
     * @return LengthAwarePaginator Learn list for display
     */
    public function getLearnMostPopular( Request $request )
    {
        $builder = $this->with( [ 'learnCategory' ] )
                        ->orderBy( 'view', 'desc' )
                        ->where( [ 'status' => 'public', 'highlight_status' => 'pinned' ] );

        $data = Search::search( $builder, 'learn', $request, [], '3' );

        return $this->transformLearnContent( $data );
    }

    public function getLearnAllList( Request $request )
    {
        $builder = $this->with( [ 'learnCategory' ] )
                        ->orderBy( 'id', 'desc' )
                        ->where( 'status', 'public' );

        $data = Search::search( $builder, 'learn', $request );

        return $this->transformLearnContent( $data );

    }
}
