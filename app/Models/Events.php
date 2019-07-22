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
    protected $fillable = [ 'title_thai', 'title_english', 'description_thai', 'description_english',
                            'location_thai', 'location_english', 'host_thai', 'host_english',
                            'link', 'start_date', 'end_date', 'event_date', 'image_path', 'view',
                            'status', 'upcoming_status' ];

    /** @var string Table name */
    protected $table = 'events';

    /**
     * Get user model relationship.
     *
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo User model relationship
     */
    public function users()
    {
        return $this->belongsTo( 'App\Models\Users', 'fk_user_id' );
    }

    /**
     * Get a list of events for displaying.
     *
     * @param Request $request Request object
     * @param int     $limit   limit of content
     *
     * @return LengthAwarePaginator A list of events for home page
     */
    public function getHomeEventsList( Request $request, $limit = 4 )
    {
        $builder = $this->where( 'status', 'public' );

        $data = Search::search( $builder, 'events', $request, [], $limit );

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
        $builder = $this->with( [ 'users' ] )->where( 'status', 'public' );

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
            $list->setAttribute( 'image_path', Utility::getImages( $list['image_path'] ) );
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
        $builder = $this->with( [ 'users' ] )->where( [ 'status' => 'public', 'upcoming_status' => 'yes' ] )
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
        $builder = $this->with( [ 'users' ] )->where( [ 'status' => 'public' ] )->orderBy( 'id', 'asc' );

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
        $events = $this->with( [ 'users' ] )->where( [ 'id' => $events->id ] )->first();

        if( $events ){
            $events->setAttribute( 'title', Utility::getLanguageFields( 'title', $events ) );
            $events->setAttribute( 'description', Utility::getLanguageFields( 'description', $events ) );
            $events->setAttribute( 'location', Utility::getLanguageFields( 'location', $events ) );
            $events->setAttribute( 'host', Utility::getLanguageFields( 'host', $events ) );
            $events->setAttribute( 'image_path', Utility::getImages( $events['image_path'] ) );
        }

        return $events;
    }

    /**
     * Get all list of events for admin.
     *
     * @param Request $request Request object
     *
     * @return LengthAwarePaginator All events list
     */
    public function getEventsAllListForAdmin( Request $request )
    {
        $builder = $this->with( [ 'users' ] )->orderBy( 'id', 'asc' );

        $data = Search::search( $builder, 'events', $request );

        return $this->transformHomeEventsContent( $data );
    }
}
