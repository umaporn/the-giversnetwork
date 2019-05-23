<?php
/**
 * Event Model
 */

namespace App\Models;

use App\Libraries\Utility;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

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
     * @return Collection A list of events for home page
     */
    public function getHomeEventsList()
    {
        $query = $this->limit( 3 )->where( 'status', 'public' )->get();

        $data = $this->transformHomeEventsContent( $query );

        return $data;
    }

    /**
     * Transform event information.
     *
     * @param Collection $homeEventsList A list of event
     *
     * @return Collection Home events list for display
     */
    private function transformHomeEventsContent( Collection $homeEventsList )
    {
        foreach( $homeEventsList as $list ){
            $list->setAttribute( 'title', Utility::getLanguageFields( 'title', $list ) );
            $list->setAttribute( 'hostname', Utility::getLanguageFields( 'host', $list ) );
        }

        return $homeEventsList;
    }
}
