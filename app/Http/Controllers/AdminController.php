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

}
