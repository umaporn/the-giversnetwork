<?php
/**
 * Manage profile information.
 */

namespace App\Http\Controllers;

use App\Models\InterestIn;
use App\Models\OrganizationCategory;
use App\Models\UserInterestIn;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Models\Users;
use Illuminate\Support\Facades\Validator;

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

    /** @var UserInterestIn UserInterestIn model */
    protected $userInterestInModel;

    /**
     * Initialize RegisterController class.
     *
     * @param Users                $users                Users model
     * @param InterestIn           $interestIn           InterestIn model
     * @param OrganizationCategory $organizationCategory OrganizationCategory model
     * @param UserInterestIn       $userInterestIn       UserInterestIn model
     */
    public function __construct( Users $users, InterestIn $interestIn, OrganizationCategory $organizationCategory, UserInterestIn $userInterestIn )
    {
        $this->usersModel                = $users;
        $this->interestInModel           = $interestIn;
        $this->organizationCategoryModel = $organizationCategory;
        $this->userInterestInModel       = $userInterestIn;
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param array $datas
     *
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator( array $data )
    {
        return Validator::make( $data, [
            'image_path'   => config( 'validation.authentication.image_path' ),
            'phone_number' => config( 'validation.authentication.phone_number' ),
        ] );
    }

    /**
     * Load a profile page of the authenticated user.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View User's profile page
     */
    public function getProfile()
    {
        $user                     = $this->usersModel->getUserProfile();
        $interestList             = $this->interestInModel->getInterestInList();
        $organizationCategoryList = $this->organizationCategoryModel->getOrganizationCategoryList();
        $userInterestInList       = $this->userInterestInModel->getUserInterestInList( $user[0]->id );

        return view( 'users.profile', compact( 'user', 'interestList', 'organizationCategoryList', 'userInterestInList' ) );
    }

    /**
     * Load a profile page of the authenticated user.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View User's profile page
     */
    public function getEditProfileForm()
    {
        $user                     = $this->usersModel->getUserProfile();
        $interestList             = $this->interestInModel->getInterestInList();
        $organizationCategoryList = $this->organizationCategoryModel->getOrganizationCategoryList();
        $userInterestInList       = $this->userInterestInModel->getUserInterestInList( $user[0]->id );

        return view( 'users.edit_profile', compact( 'user', 'interestList', 'organizationCategoryList', 'userInterestInList' ) );
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
        $this->validator( $request->input() )->validate();

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

    /**
     * Load a user profile page.
     *
     * @param string $id Users id
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View User's profile page
     */
    public function getUserProfile( string $id )
    {
        $user                     = $this->usersModel->where( 'id', $id )->get();
        $interestList             = $this->interestInModel->getInterestInList();
        $organizationCategoryList = $this->organizationCategoryModel->getOrganizationCategoryList();
        $userInterestInList       = $this->userInterestInModel->getUserInterestInList( $id );

        return view( 'users.profile', compact( 'user', 'interestList', 'organizationCategoryList', 'userInterestInList' ) );
    }
}
