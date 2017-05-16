<?php
/**
 * Manage user templates.
 */

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\UserRequest;
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
     * Load a profile page of logged in user.
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
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    public function changePassword( UserRequest $request )
    {
        $success = $this->userModel->changePassword( $request->input( 'password' ) );

        if( $request->ajax() ){
            return response()->json( [ 'success' => $success ] );
        } else {
            return redirect()->route( 'user.profile' );
        }
    }
}
