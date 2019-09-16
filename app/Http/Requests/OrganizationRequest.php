<?php
/**
 * A custom request class for organization
 */

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Create organization validation rules.
 */
class OrganizationRequest extends FormRequest
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
            'fk_category_id' => config( 'validation.organization_admin.fk_category_id' ),
            'name_english'   => config( 'validation.organization_admin.name_english' ),
            'phone_number'   => config( 'validation.organization_admin.phone_number' ),
            'address'        => config( 'validation.organization_admin.address' ),
        ];
    }
}
