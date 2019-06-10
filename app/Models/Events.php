<?php
/**
 * Events Model
 */

namespace App\Models;

use App\Libraries\Search;
use App\Libraries\Utility;
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
     * Get a list of events for displaying in learn page.
     *
     * @param Request $request Events request object
     *
     * @return LengthAwarePaginator A list of events for home page
     */
    public function getEventsForSidebar( Request $request )
    {
        $builder = $this->where( 'status', 'public' );

        $data = Search::search( $builder, 'events', $request, [], '1' );

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
            $list->setAttribute( 'host_image', Utility::getImages( $list['host_image'] ) );
        }

        return $homeEventsList;
    }

    /**
     * Get up coming events.
     *
     * @param Request $request Request object
     *
     * @return LengthAwarePaginator Up coming events list
     */
    public function getUpComingEvents( Request $request )
    {
        $builder = $this->where( [ 'status' => 'public', 'upcoming_status' => 'yes' ] )
                        ->orderBy( 'start_date', 'desc' );

        $data = Search::search( $builder, 'events', $request, [], '3' );

        return $this->transformHomeEventsContent( $data );
    }

    /**
     * Get all list of events.
     *
     * @param Request $request Request object
     *
     * @return LengthAwarePaginator All events list
     */
    public function getAllListEvents( Request $request )
    {
        $builder = $this->where( [ 'status' => 'public' ] )->orderBy( 'id', 'desc' );

        $data = Search::search( $builder, 'events', $request );

        return $this->transformHomeEventsContent( $data );
    }

    /**
     * Get events detail information.
     *
     * @param Events $events Events model
     *
     * @return Events events detail
     */
    public function getEventsDetail( Events $events )
    {
        $events = $this->where( [ 'id' => $events->id ] )->first();

        if( $events ){
            $events->setAttribute( 'title', Utility::getLanguageFields( 'title', $events ) );
            $events->setAttribute( 'description', Utility::getLanguageFields( 'description', $events ) );
            $events->setAttribute( 'location', Utility::getLanguageFields( 'location', $events ) );
            $events->setAttribute( 'host', Utility::getLanguageFields( 'host', $events ) );
            $events->setAttribute( 'image_path', Utility::getImages( $events['image_path'] ) );
        }

        return $events;
    }
}
