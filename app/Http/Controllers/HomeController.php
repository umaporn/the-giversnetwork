<?php
/**
 * Home Page Controller
 */

namespace App\Http\Controllers;

/**
 * Home Page Controller
 * @package App\Http\Controllers
 */
class HomeController extends Controller
{
    /**
     * Display home page.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View Home page
     */
    public function index()
    {
        return view( 'home' );
    }
}
