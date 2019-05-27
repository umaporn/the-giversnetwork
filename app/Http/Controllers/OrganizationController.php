<?php
/**
 * Organization Controller
 */

namespace App\Http\Controllers;

use App\Models\Organization;

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
}
