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
use Illuminate\Support\Collection;

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
     * @param Collection $organizationList A list of organization list
     *
     * @return LengthAwarePaginator A list of organization
     */
    private function transformOrganizationList( LengthAwarePaginator $organizationList )
    {
        foreach( $organizationList as $list ){
            $list->setAttribute( 'name', Utility::getLanguageFields( 'name', $list ) );
            $list->setAttribute( 'category_title', Utility::getLanguageFields( 'title', $list->organizationCategory ) );
        }

        return $organizationList;
    }

    /**
     * Get learn all list.
     *
     * @param Request $request Request Object
     *
     * @return LengthAwarePaginator list of learn
     */
    public function getOrganizationAllList( Request $request )
    {
        $builder = $this->with( [ 'organizationCategory' ] )
                        ->orderBy( 'id', 'desc' );

        $fk_category_id = $request->get( 'category_id' ) ? $request->get( 'category_id' ) : '';

        if( $fk_category_id ){
            $builder->where( [ 'fk_category_id' => $fk_category_id ] );
        }

        $data = Search::search( $builder, 'organization', $request );

        return $this->transformOrganizationList( $data );

    }
}
