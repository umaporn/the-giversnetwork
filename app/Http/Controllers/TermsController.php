<?php
/**
 * Terms And Conditions Page Controller
 */

namespace App\Http\Controllers;

/**
 * Terms And Conditions Page Controller
 * @package App\Http\Controllers
 */
class TermsController extends Controller
{
    /**
     * Display terms and conditions page.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View Terms And Conditions page
     */
    public function terms()
    {
        return view( 'terms' );
    }

    /**
     * Display policy page.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View Policy page
     */
    public function policy()
    {
        return view( 'policy' );
    }
}
