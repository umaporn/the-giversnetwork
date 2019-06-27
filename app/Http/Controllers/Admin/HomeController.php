<?php
/**
 * Admin Home Page Controller
 */

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

/**
 * Admin Home Page Controller
 * @package App\Http\Controllers
 */
class HomeController extends Controller
{
    /**
     * Display admin home page.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View Home page
     */
    public function index()
    {
        return view( 'admin.home' );
    }
}
