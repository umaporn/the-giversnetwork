<?php
/**
 * EventRegistration Model
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Http\Requests\EventsRegistrationRequest;

class EventsRegistration extends Model
{
    /** @var array A list of fields which are able to update in this model */
    protected $fillable = [ 'first_name', 'last_name', 'phone', 'email', 'social_challenge',
                            'organization', 'utm_source', 'utm_medium', 'utm_content', 'utm_campaign',
                            'utm_term' ];

    /** @var string Table name */
    protected $table = 'events_registration';

    /**
     * Create events registration information.
     *
     * @param EventsRegistrationRequest $request EventRegistration request object
     *
     * @return array Response information
     */
    public function createEventsRegistration( EventsRegistrationRequest $request )
    {
        $newEventsRegistration = [
            'first_name'       => $request->input( 'first_name' ),
            'last_name'        => $request->input( 'last_name' ),
            'phone'            => $request->input( 'phone' ),
            'email'            => $request->input( 'email' ),
            'social_challenge' => $request->input( 'social_challenge' ),
            'organization'     => $request->input( 'organization' ),
            'utm_source'       => $request->input( 'utm_source' ),
            'utm_medium'       => $request->input( 'utm_medium' ),
            'utm_content'      => $request->input( 'utm_content' ),
            'utm_campaign'     => $request->input( 'utm_campaign' ),
            'utm_term'         => $request->input( 'utm_term' ),
        ];

        $successForEventsRegistration = $this->create( $newEventsRegistration );

        return [ 'successForEventsRegistration' => $successForEventsRegistration ];

    }
}
