<?php
/**
 * Organization Model
 */

namespace App\Models;

use App\Http\Requests\OrganizationRequest;
use App\Libraries\Image;
use App\Libraries\Search;
use App\Libraries\Utility;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class Organization extends Model
{
    /** @var array A list of fields which are able to update in this model */
    protected $fillable = [ 'fk_category_id', 'name_thai', 'name_english', 'content_thai', 'content_english',
                            'image_path', 'email', 'phone_number', 'address', 'website', 'facebook', 'twitter',
                            'youtube', 'instagram', 'linked_in',
    ];

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

    /**
     * Get organization all list for admin.
     *
     * @param Request $request Request Object
     *
     * @return LengthAwarePaginator list of organization
     */
    public function getOrganizationAllListForAdmin( Request $request )
    {
        $builder = $this->with( [ 'organizationCategory' ] )
                        ->orderBy( 'id', 'desc' );

        $data = Search::search( $builder, 'organization', $request );

        return $this->transformOrganizationList( $data );

    }

    /**
     * Create organization information.
     *
     * @param OrganizationRequest $request Organization request object
     *
     * @return array Response information
     */
    public function createOrganization( OrganizationRequest $request )
    {
        $file_path        = '';
        $imageInformation = $this->saveImage( $request );

        if( isset( $imageInformation['imageInformation']['original'] ) ){
            $file_path = $imageInformation['imageInformation']['original'];
        }

        $newOrganization = [
            'name_english'    => $request->input( 'name_english' ),
            'name_thai'       => $request->input( 'name_english' ),
            'content_english' => $request->input( 'content_english' ),
            'content_thai'    => $request->input( 'content_english' ),
            'image_path'      => $file_path,
            'fk_category_id'  => $request->input( 'fk_category_id' ),
            'email'           => $request->input( 'email' ),
            'phone_number'    => $request->input( 'phone_number' ),
            'address'         => $request->input( 'address' ),
            'website'         => $request->input( 'website' ),
            'facebook'        => $request->input( 'facebook' ),
            'twitter'         => $request->input( 'twitter' ),
            'youtube'         => $request->input( 'youtube' ),
            'instagram'       => $request->input( 'instagram' ),
            'linked_in'       => $request->input( 'linked_in' ),
        ];

        $successForOrganization = $this->create( $newOrganization );

        return [ 'successForOrganization' => $successForOrganization ];

    }

    /**
     * Handle image upload from file browser.
     *
     * @param OrganizationRequest $request Request object
     *
     * @return array Image saved result
     */
    private function saveImage( OrganizationRequest $request )
    {
        $imageInformation = [];
        $file             = $request->file( 'image_path' )[0];
        $success          = true;

        if( $file ){

            $imageInformation = Image::upload( $file, 'organization' );
            $success          = ( count( $imageInformation ) ) ? true : false;

            if( $this->id ){
                $this->deleteImage();
            }

        }

        return [ 'success' => $success, 'imageInformation' => $imageInformation ];
    }

    /**
     * Updating organization information.
     *
     * @param OrganizationRequest $request      Organization request object
     * @param Learn               $organization Organization model
     *
     * @return array Response information
     */
    public function updateOrganizationInformation( OrganizationRequest $request, Organization $organization )
    {
        $data = [
            'name_english'    => $request->input( 'name_english' ),
            'name_thai'       => $request->input( 'name_english' ),
            'content_english' => $request->input( 'content_english' ),
            'content_thai'    => $request->input( 'content_english' ),
            'fk_category_id'  => $request->input( 'fk_category_id' ),
            'email'           => $request->input( 'email' ),
            'phone_number'    => $request->input( 'phone_number' ),
            'address'         => $request->input( 'address' ),
            'website'         => $request->input( 'website' ),
            'facebook'        => $request->input( 'facebook' ),
            'twitter'         => $request->input( 'twitter' ),
            'youtube'         => $request->input( 'youtube' ),
            'instagram'       => $request->input( 'instagram' ),
            'linked_in'       => $request->input( 'linked_in' ),
        ];

        if( $request->file( 'image_path' ) ){
            $imageInformation = $this->saveImage( $request );

            if( isset( $imageInformation['imageInformation']['original'] ) ){
                $image_file = $imageInformation['imageInformation']['original'];

                $data['image_path'] = $image_file;
            }
        }

        $result = $this->where( 'id', $organization->id )->update( $data );

        if( $result ){
            $response = [ 'success' => true, 'message' => __( 'organization_admin.saved_organization_success' ), ];
        } else {
            $response = [ 'success' => false, 'message' => __( 'organization_admin.saved_organization_error' ), ];
        }

        return $response;

    }
}
