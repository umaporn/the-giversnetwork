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
            'title_thai'          => config( 'validation.share_admin.title_thai' ),
            'description_english' => config( 'validation.share_admin.description_english' ),
            'description_thai'    => config( 'validation.share_admin.description_thai' ),
            'content_english'     => config( 'validation.share_admin.content_english' ),
            'content_thai'        => config( 'validation.share_admin.content_thai' ),
        ];
    }
}
