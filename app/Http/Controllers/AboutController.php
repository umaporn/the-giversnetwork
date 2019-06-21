<?php
/**
 * About Controller
 */

namespace App\Http\Controllers;

/**
 * This class uses for About page.
 * @package App\Http\Controllers
 */
class AboutController extends Controller
{
    /**
     * Display about page.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View About page
     */
    public function index()
    {
        return view( 'about.index' );
    }
}
