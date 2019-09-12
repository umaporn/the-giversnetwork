<?php
/**
 * A custom request class for event_registration
 */

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Create event registration validation rules.
 */
class EventRegistrationRequest extends FormRequest
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
            'first_name' => config( 'validation.event_registration.first_name' ),
            'last_name'  => config( 'validation.event_registration.last_name' ),
            'phone'      => config( 'validation.event_registration.phone' ),
            'email'      => config( 'validation.event_registration.email' ),
            'gender'     => config( 'validation.event_registration.gender' ),
            'country'    => config( 'validation.event_registration.country' ),
            'profession' => config( 'validation.event_registration.profession' ),
        ];
    }
}
