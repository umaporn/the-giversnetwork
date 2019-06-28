<?php
/**
 * Admin User Page Controller
 */

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\UserInterestIn;
use App\Models\OrganizationCategory;
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

    /**
     * Initialize UserController class.
     *
     * @param Users                $users                Users model
     * @param UserInterestIn       $userInterestIn       UserInterestIn model
     * @param OrganizationCategory $organizationCategory OrganizationCategory model
     */
    public function __construct( Users $users, UserInterestIn $userInterestIn, OrganizationCategory $organizationCategory )
    {
        $this->usersModel                = $users;
        $this->userInterestInModel       = $userInterestIn;
        $this->organizationCategoryModel = $organizationCategory;
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

        return view( 'admin.users.list', compact( 'users' ) );
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
}
