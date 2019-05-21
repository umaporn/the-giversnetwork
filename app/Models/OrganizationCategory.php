<?php
/**
 * Organization Model
 */
namespace App\Models;

use App\Libraries\Utility;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class OrganizationCategory extends Model
{
    /** @var array A list of fields which are able to update in this model */
    protected $fillable = [];

    /** @var string Table name */
    protected $table = 'organization_category';

    /**
     * Get interest in list.
     */
    public function getOrganizationCategoryList()
    {
        $organizationCategoryList = $this->get();
        $data                     = $this->transformOrganizationCategoryList( $organizationCategoryList );

        return $data;
    }

    /**
     * Transform interest in information.
     *
     * @param Collection $organizationCategoryList A list of interest in list
     *
     * @return Collection A list of interest in
     */
    private function transformOrganizationCategoryList( Collection $organizationCategoryList )
    {
        foreach( $organizationCategoryList as $list ){
            $list->setAttribute( 'title', Utility::getLanguageFields( 'title', $list ) );
        }

        return $organizationCategoryList;
    }

}
