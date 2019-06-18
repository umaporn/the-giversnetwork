<?php
/**
 * Organization Controller
 */

namespace App\Http\Controllers;

use App\Models\Organization;
use App\Models\OrganizationCategory;
use Illuminate\Http\Request;

/**
 * organization Page Controller
 * @package App\Http\Controllers
 */
class OrganizationController extends Controller
{
    /** @var Organization organization model instance */
    private $organizationModel;

    /** @var OrganizationCategory organization category model instance */
    private $organizationCategoryModel;

    /**
     * Initialize HomeController class.
     *
     * @param Organization         $organization         Organization model
     * @param OrganizationCategory $organizationCategory Organization Category model
     */
    public function __construct( Organization $organization, OrganizationCategory $organizationCategory )
    {
        $this->organizationModel         = $organization;
        $this->organizationCategoryModel = $organizationCategory;
    }

    /**
     * Display organization page.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View Organization page
     */
    public function index( Request $request )
    {
        $data['organizationCategory'] = $this->organizationCategoryModel->getOrganizationCategoryList();
        $data['allList']              = $this->organizationModel->getOrganizationAllList( $request );
        $category_id                  = $request->get( 'category_id' );

        if( $request->ajax() ){
            return response()->json( [
                                         'data' => view( 'organization.list', compact( 'data', 'category_id' ) )->render(),
                                     ] );
        }

        return view( 'organization.index', compact( 'data', 'category_id' ) );
    }

    /**
     * Display organization detail page.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View Organization detail page
     */
    public function detail( Organization $organization )
    {
        return view( 'organization.detail' );
    }

}

