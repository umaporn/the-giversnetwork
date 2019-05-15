<?php
/**
 * Manage profile information.
 */

namespace App\Http\Controllers;

use App\Models\InterestIn;
use App\Models\OrganizationCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Models\Users;
use Illuminate\Support\Facades\Auth;

/**
 * Profile Controller
 * @package App\Http\Controllers
 */
class ProfileController extends Controller
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
     * Load a profile page of the authenticated user.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View User's profile page
     */
    public function getProfile( Request $request )
    {
        $user                     = $this->usersModel->getUserProfile();
        $interestList             = $this->interestInModel->getInterestInList();
        $organizationCategoryList = $this->organizationCategoryModel->getOrganizationCategoryList();

        return view( 'users.profile', compact('user', 'interestList', 'organizationCategoryList') );
    }

    /**
     * Update the authenticated user's profile.
     *
     * @param Request $request HTTP request object
     *
     * @return \Illuminate\Http\JsonResponse Update response
     */
    public function updateProfile( Request $request )
    {
        $response = $this->usersModel->updateUser( $request );

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
     * Send password reset link by email.
     *
     * @param Request $request HTTP request object
     *
     * @return \Illuminate\Http\JsonResponse Sending password reset link response
     */
    public function resetPassword( Request $request )
    {
        $response = ClientGrant::call(
            'POST',
            '/api/beginning/password/email/' . App::getLocale(),
            [ 'form_params' => [ 'email' => $request->user()->getAuthIdentifier() ] ]
        );

        return response()->json( [ 'success' => $response['success'], 'message' => $response['message'] ] );
    }
}
