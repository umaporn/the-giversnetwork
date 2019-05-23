<?php
/**
 * Admin Controller
 */

namespace App\Http\Controllers;

/**
 * This class uses for Admin page.
 * @package App\Http\Controllers
 */
class AdminController extends Controller
{

    /**
     * Show Admin index page.
     *
     * @return \Illuminate\View\View Admin index page
     */
    public function index()
    {
        return view( 'admin.index' );
    }

    /**
     * Show learn-all page.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View learn-all page
     */
    public function learnAll()
    {
        return view( 'admin.learnAll' );
    }

}
