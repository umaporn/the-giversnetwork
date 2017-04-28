<?php
/**
 * Home page controller
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/**
 * Class HomeController
 * @package App\Http\Controllers
 */
class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\View Home page
     */
    public function index()
    {
        $this->authorize( 'view', $this );

        return view( 'home' );
    }
}
