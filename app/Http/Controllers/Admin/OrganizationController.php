<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\OrganizationRequest;
use App\Models\Organization;
use App\Models\OrganizationCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrganizationController extends Controller
{
    /** @var Organization Organization model */
    protected $organizationModel;

    /** @var OrganizationCategory organization category model instance */
    private $organizationCategoryModel;

    /**
     * Initialize OrganizationController class.
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
     * Display admin organization page.
     *
     * @param Request $request Request object
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View Organization page
     */
    public function index( Request $request )
    {
        $organizations = $this->organizationModel->getOrganizationAllListForAdmin( $request );

        return view( 'admin.organization.index', compact( 'organizations' ) );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $organizationCategory = $this->organizationCategoryModel->getOrganizationCategoryList();

        return view( 'admin.organization.create', compact( 'organizationCategory' ) );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param OrganizationRequest $request Request object
     *
     * @return mixed
     */
    public function store( OrganizationRequest $request )
    {
        $result = $this->organizationModel->createOrganization( $request );

        return $this->setUpdateOrCreationResponse( $request, $result );
    }

    /**
     * Display admin organization edition form.
     *
     * @param Organization $organization organization model
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View Organization edition form
     */
    public function edit( Organization $organization )
    {
        $organizationCategory = $this->organizationCategoryModel->getOrganizationCategoryList();

        return view( 'admin.organization.edit', compact( 'organization', 'organizationCategory' ) );
    }

    /**
     * Updating organization information.
     *
     * @param OrganizationRequest $request      Organization request object
     * @param Organization        $organization Organization model
     *
     * @return \Illuminate\Http\JsonResponse Updating response
     */
    public function update( OrganizationRequest $request, Organization $organization )
    {
        $response = $this->organizationModel->updateOrganizationInformation( $request, $organization );

        if( !$response['success'] ){
            return response()->json( $response, 422 );
        }

        return response()->json( [
                                     'success'       => $response['success'],
                                     'message'       => $response['message'],
                                     'redirectedUrl' => url()->previous(),
                                 ] );
    }

    /**
     * Delete a specific organization.
     *
     * @param Request      $request      Request object
     * @param Organization $organization Organization model
     *
     * @return    \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    public function destroy( Request $request, Organization $organization )
    {
        $success = $organization->delete();

        if( $request->ajax() ){
            return response()->json( [
                                         'success'       => $success,
                                         'message'       => __( 'organization_admin.organization_management.remove_organization_success' ),
                                         'redirectedUrl' => route( 'admin.organization.index' ),
                                     ] );
        }
    }

    /**
     * Set update or creation response.
     *
     * @param Request $request Request object
     * @param array   $result  Updating or creating result
     *
     * @return    \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse
     */
    private function setUpdateOrCreationResponse( Request $request, array $result )
    {
        $response = $this->setResponseMessages( $result );

        if( $request->ajax() ){
            return response()->json( $response );
        } else {
            return redirect()->route( 'admin.organization.index' );
        }
    }

    /**
     * Set error messages from result.
     *
     * @param array $result Result of saved organization
     *
     * @return array Error messages
     */
    private function setResponseMessages( array $result )
    {

        if( !$result['successForOrganization'] && !$result['successForOrganizationImage'] ){
            $data = [
                'success' => false,
                'error'   => __( 'organization_admin.saved_organization_error' ),
            ];
        } else {
            $data = [
                'success'       => true,
                'message'       => __( 'organization_admin.saved_organization_success' ),
                'redirectedUrl' => route( 'admin.organization.index' ),
            ];
        }

        return $data;
    }
}
