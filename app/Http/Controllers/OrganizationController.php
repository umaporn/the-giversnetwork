<?php
/**
 * Organization Page Controller
 */

namespace App\Http\Controllers;

use App\Support\Facades\PasswordGrant;

/**
 * organization Page Controller
 * @package App\Http\Controllers
 */
class OrganizationController extends Controller
{
    /**
     * Display organization page.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View organization page
     */
    public function index()
    {
        return view( 'organization.index' );
    }
    /**
     * Display organization profile page.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View organization profile page
     */
    public function profile()
    {
        return view( 'organization.profile' );
    }
}