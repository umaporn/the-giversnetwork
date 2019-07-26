<?php
/**
 * A custom request class for share
 */

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Create share validation rules.
 */
class ShareRequest extends FormRequest
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
            'title_english'       => config( 'validation.share_admin.title_english' ),
            'description_english' => config( 'validation.share_admin.description_english' ),
        ];
    }
}
