<?php
/**
 * Admin User Page Controller
 */

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\InterestIn;
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

    /** @var InterestIn InterestIn model */
    protected $interestInModel;

    /** @var OrganizationCategory OrganizationCategory model */
    protected $organizationCategoryModel;

    /**
     * Initialize RegisterController class.
     *
     * @param Users $users Users model
     */
    public function __construct( Users $users, InterestIn $interestIn, OrganizationCategory $organizationCategory )
    {
        $this->usersModel                = $users;
        $this->interestInModel           = $interestIn;
        $this->organizationCategoryModel = $organizationCategory;
    }

    /**
     * Display admin user page.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View Home page
     */
    public function index( Request $request )
    {
        $users = $this->usersModel->getUserList( $request );

        return view( 'admin.users.list', compact('users') );
    }

    /**
     * Delete a specific user.
     *
     * @param     UserRequest    $request    User request object
     * @param     User           $user       User model
     * @return    \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    public function destroy( Request $request, Users $user )
    {
        $success = $user->delete();

        if( $request->ajax() ){
            return response()->json([ 'success' => $success ]);
        }else{
            return redirect()->route( 'admin.user.index' );
        }
    }
}
