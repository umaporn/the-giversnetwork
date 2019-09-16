<?php
/**
 * A custom request class for events
 */

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Create events validation rules.
 */
class EventsRequest extends FormRequest
{
    /**
     * Determine if the authenticated user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array Rules
     */
    public function rules()
    {
        return [
            'title_english'       => config( 'validation.events_admin.title_english' ),
            'description_english' => config( 'validation.events_admin.description_english' ),
            'location_english'    => config( 'validation.events_admin.location_english' ),
            'host_english'        => config( 'validation.events_admin.host_english' ),
            'event_date'          => config( 'validation.events_admin.event_date' ),
            'link'                => config( 'validation.events_admin.link' ),
        ];
    }
}
