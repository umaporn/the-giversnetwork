<?php
/**
 * Home Page Controller
 */

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Libraries\AuthenticatableUser;

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
        $user = Auth::user();
        return view( 'home', compact('user') );
    }
}
