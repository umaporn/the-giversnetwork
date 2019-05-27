<?php
/**
 * Organization Model
 */
namespace App\Models;

use App\Libraries\Utility;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class Organization extends Model
{
    /** @var array A list of fields which are able to update in this model */
    protected $fillable = [];

    /** @var string Table name */
    protected $table = 'organization';

    /**
     * Get organization list.
     */
    public function getOrganizationList()
    {
        $organizationCategoryList = $this->get();
        $data                     = $this->transformOrganizationList( $organizationCategoryList );

        return $data;
    }

    /**
     * Transform organization information.
     *
     * @param Collection $organizationList A list of organization list
     *
     * @return Collection A list of organization
     */
    private function transformOrganizationList( Collection $organizationList )
    {
        foreach( $organizationList as $list ){
            $list->setAttribute( 'title', Utility::getLanguageFields( 'title', $list ) );
        }

        return $organizationList;
    }

}
