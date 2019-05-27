<?php
/**
 * User Page Controller
 */

namespace App\Http\Controllers;

use App\Support\Facades\PasswordGrant;

/**
 * User Page Controller
 * @package App\Http\Controllers
 */
class UsersController extends Controller
{
    /**
     * Display home page.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View Users page
     */
    public function signup()
    {
        return view( 'users.signup' );
    }

    public function editProfile()
    {
        return view( 'users.editProfile' );
    }
}
