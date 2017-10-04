<?php
/**
 * Manage user templates.
 */

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

/**
 * User Controller
 * @package App\Http\Controllers
 */
class UserController extends Controller
{
    /** @var User User model instance */
    private $userModel;

    /**
     * UserController constructor.
     *
     * @param User $user User model instance
     */
    public function __construct( User $user )
    {
        $this->userModel = $user;
    }

    /**
     * Load a profile page of the authenticated user.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View User's profile page
     */
    public function profile()
    {
        $user = Auth::user();

        return view( 'users.profile', compact( 'user' ) );
    }

    /**
     * Change the authenticated user's password.
     *
     * @param UserRequest $request User request object
     *
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse HTTP
     *                                                                                                        response
     *                                                                                                        object
     */
    public function changePassword( UserRequest $request )
    {
        $success = $this->userModel->changePassword( $request->input( 'password' ) );

        if( $request->expectsJson() ){

            $message = $success ? __( 'user.profile.successful_password_change' ) : __( 'user.profile.failed_password_change' );

            return response()->json( [ 'success' => $success, 'message' => $message ] );
        }

        return redirect()->route( 'user.profile' );
    }
}
