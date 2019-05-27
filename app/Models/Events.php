<?php
/**
 * Event Model
 */

namespace App\Models;

use App\Libraries\Search;
use App\Libraries\Utility;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class Events extends Model
{
    /** @var array A list of fields which are able to update in this model */
    protected $fillable = [];

    /** @var string Table name */
    protected $table = 'events';

    /**
     * Get a list of events for displaying.
     *
     * @param Request $request Events request object
     *
     * @return LengthAwarePaginator A list of events for home page
     */
    public function getHomeEventsList( Request $request )
    {
        $builder = $this->where( 'status', 'public' );

        $data = Search::search( $builder, 'events', $request, [], '3' );

        return $this->transformHomeEventsContent( $data );
    }

    /**
     * Transform event information.
     *
     * @param LengthAwarePaginator $homeEventsList A list of event
     *
     * @return LengthAwarePaginator Home events list for display
     */
    private function transformHomeEventsContent( LengthAwarePaginator $homeEventsList )
    {
        foreach( $homeEventsList as $list ){
            $list->setAttribute( 'title', Utility::getLanguageFields( 'title', $list ) );
            $list->setAttribute( 'hostname', Utility::getLanguageFields( 'host', $list ) );
        }

        return $homeEventsList;
    }
}
