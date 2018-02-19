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
     * Display home page.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View Home page
     * @throws \Illuminate\Auth\Access\AuthorizationException Authorization exception
     */
    public function index()
    {
        $this->authorize( 'view', $this );

        return view( 'home' );
    }
}
