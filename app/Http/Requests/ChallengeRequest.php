<?php
/**
 * A custom request class for challenge
 */

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Create challenge validation rules.
 */
class ChallengeRequest extends FormRequest
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
            'title_english'       => config( 'validation.challenge_admin.title_english' ),
            'description_english' => config( 'validation.challenge_admin.description_english' ),
            'content_english'     => config( 'validation.challenge_admin.content_english' ),
        ];
    }
}
