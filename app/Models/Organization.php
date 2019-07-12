<?php
/**
 * Organization Model
 */

namespace App\Models;

use App\Libraries\Search;
use App\Libraries\Utility;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class Organization extends Model
{
    /** @var array A list of fields which are able to update in this model */
    protected $fillable = [ 'fk_category_id', 'name_thai', 'name_english', 'image_path', 'email',
                            'phone_number', 'address' ];

    /** @var string Table name */
    protected $table = 'organization';

    /**
     * Get organization category model relationship.
     *
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo Organization category model relationship
     */
    public function organizationCategory()
    {
        return $this->belongsTo( 'App\Models\OrganizationCategory', 'fk_category_id' );
    }

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
     * @param LengthAwarePaginator $organizationList A list of organization list
     *
     * @return LengthAwarePaginator A list of organization
     */
    private function transformOrganizationList( LengthAwarePaginator $organizationList )
    {
        foreach( $organizationList as $list ){
            $list->setAttribute( 'name', Utility::getLanguageFields( 'name', $list ) );
            $list->setAttribute( 'category_title', Utility::getLanguageFields( 'title', $list->organizationCategory ) );
            $list->setAttribute( 'image_path', Utility::getImages( $list['image_path'] ) );
        }

        return $organizationList;
    }

    /**
     * Get organization all list.
     *
     * @param Request $request Request Object
     *
     * @return LengthAwarePaginator list of organization
     */
    public function getOrganizationAllList( Request $request )
    {
        $builder = $this->with( [ 'organizationCategory' ] )
                        ->orderBy( 'id', 'asc' );

        $fk_category_id = $request->get( 'category_id' ) ? $request->get( 'category_id' ) : '';

        if( $fk_category_id ){
            $builder->where( [ 'fk_category_id' => $fk_category_id ] );
        }

        $data = Search::search( $builder, 'organization', $request );

        return $this->transformOrganizationList( $data );

    }

    /**
     * Get organization detail information.
     *
     * @param Organization $organization Organization model
     *
     * @return Organization organization detail
     */
    public function getOrganizationDetail( Organization $organization )
    {
        $organization = $this->with( [ 'organizationCategory' ] )->where( [ 'id' => $organization->id ] )->first();

        if( $organization ){
            $organization->setAttribute( 'name', Utility::getLanguageFields( 'name', $organization ) );
            $organization->setAttribute( 'content', Utility::getLanguageFields( 'content', $organization ) );
            $organization->setAttribute( 'category_title', Utility::getLanguageFields( 'title', $organization->organizationCategory ) );
            $organization->setAttribute( 'image_path', Utility::getImages( $organization->image_path ) );
        }

        return $organization;
    }
}
