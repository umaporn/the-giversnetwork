<?php
/**
 * Admin User Page Controller
 */

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\UserInterestIn;
use App\Models\OrganizationCategory;
use App\Models\Permission;
use App\Models\Users;
use Illuminate\Http\Request;

/**
 * Admin User Page Controller
 * @package App\Http\Controllers
 */
class UserController extends Controller
{
    /** @var Users User model */
    protected $usersModel;

    /** @var UserInterestIn UserInterestIn model */
    protected $userInterestInModel;

    /** @var OrganizationCategory OrganizationCategory model */
    protected $organizationCategoryModel;

    /** @var Permission Permission model */
    protected $permissionModel;

    /**
     * Initialize UserController class.
     *
     * @param Users                $users                Users model
     * @param UserInterestIn       $userInterestIn       UserInterestIn model
     * @param OrganizationCategory $organizationCategory OrganizationCategory model
     */
    public function __construct( Users $users, UserInterestIn $userInterestIn, OrganizationCategory $organizationCategory, Permission $permission )
    {
        $this->usersModel                = $users;
        $this->userInterestInModel       = $userInterestIn;
        $this->organizationCategoryModel = $organizationCategory;
        $this->permissionModel           = $permission;
    }

    /**
     * Display admin user page.
     *
     * @param Request $request Request object
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View Home page
     */
    public function index( Request $request )
    {
        $users = $this->usersModel->getUserList( $request );

        if( $request->ajax() ){
            return response()->json( [
                                         'data' => view( 'admin.users.list', compact( 'users' ) )->render(),
                                     ] );
        }

        return view( 'admin.users.index', compact( 'users' ) );
    }

    /**
     * Delete a specific user.
     *
     * @param Request        $request        Request object
     * @param Users          $users          Users model
     * @param UserInterestIn $userInterestIn UserInterestIn model
     *
     * @return    \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    public function destroy( Request $request, Users $user, UserInterestIn $userInterestIn )
    {
        $successDeleteUserInterest = $userInterestIn->where( [ 'fk_user_id' => $user->id ] )->delete();
        if( $successDeleteUserInterest ){
            $success = $user->delete();
        }

        if( $request->ajax() ){
            return response()->json( [
                                         'success'       => $success,
                                         'message'       => __( 'user_admin.user_management.remove_user_success' ),
                                         'redirectedUrl' => route( 'admin.user.index' ),
                                     ] );
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Users $user Usersmodel
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View Edition view
     */
    public function edit( Users $user )
    {
        $permission = $this->permissionModel->get();

        return view( 'admin.users.edit', compact( 'user', 'permission' ) );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request Request object
     * @param Users   $user    User model
     *
     * @return \Illuminate\Http\JsonResponse Updating response
     */
    public function update( Request $request, Users $user )
    {
        $response = $this->usersModel->where( 'id', $user->id )
                         ->update( [ 'fk_permission_id' => $request->input( 'fk_permission_id' ) ] );

        if( !$response ){
            return response()->json( $response, 422 );
        }

        return response()->json( [
                                     'success'       => true,
                                     'message'       => __( 'user_admin.user_management.edit_user_success' ),
                                     'redirectedUrl' => url()->previous(),
                                 ] );
    }
}
