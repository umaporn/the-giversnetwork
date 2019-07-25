<?php
/**
 * A custom request class for banner
 */

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Create banner validation rules.
 */
class BannerRequest extends FormRequest
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
            'title_english'        => config( 'validation.banner_admin.title_english' ),
            'image_path_english[]' => config( 'validation.banner_admin.image_path_english' ),
        ];
    }
}
