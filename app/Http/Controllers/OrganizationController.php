<?php
/**
 * Organization Controller
 */

namespace App\Http\Controllers;

use App\Models\Organization;

/**
 * organization Page Controller
 * @package App\Http\Controllers
 */
class OrganizationController extends Controller
{
    /**
     * Display organization page.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View Organization page
     */
    public function index()
    {
        return view( 'organization.index' );
    }

    /**
     * Display organization detail page.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View Organization detail page
     */
    public function detail( Organization $organization )
    {
        //return view( 'organization.detail' );
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

