<?php
/**
 * Home page controller
 */

namespace App\Http\Controllers;

/**
 * Home Page Controller
 * @package App\Http\Controllers
 */
class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View Home page
     */
    public function index()
    {
        $this->authorize( 'view', $this );

        return view( 'home' );
    }
}
