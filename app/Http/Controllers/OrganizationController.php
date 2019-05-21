<?php
/**
 * Organization Controller
 */
namespace App\Http\Controllers;

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
}
