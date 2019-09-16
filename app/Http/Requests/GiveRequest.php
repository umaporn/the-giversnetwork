<?php
/**
 * A custom request class for give
 */

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Create give validation rules.
 */
class GiveRequest extends FormRequest
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
            'type'                => config( 'validation.give_admin.type' ),
            'fk_category_id'      => config( 'validation.give_admin.fk_category_id' ),
            'title_english'       => config( 'validation.give_admin.title_english' ),
            'description_english' => config( 'validation.give_admin.description_english' ),
            'amount'              => config( 'validation.give_admin.amount' ),
            'address'             => config( 'validation.give_admin.address' ),
        ];
    }
}
