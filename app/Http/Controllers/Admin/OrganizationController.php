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
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show( $id )
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit( $id )
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int                      $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update( Request $request, $id )
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id )
    {
        //
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
