<?php
/**
 * Admin Learn Page Controller
 */

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

/**
 * Admin Learn Page Controller
 * @package App\Http\Controllers
 */
class LearnController extends Controller
{
    /**
     * Display admin learn page.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View Learn page
     */
    public function index()
    {
        return view( 'admin.learn.index' );
    }
}
