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
    public function editProfile()
    {
        return view( 'admin.editProfile' );
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
    public function learnAdd()
    {
        return view( 'admin.learnAdd' );
    }
    /**
     * Show shaew page.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View share page
     */
    public function shareChAll()
    {
        return view( 'admin.shareChAll' );
    }
    public function shareChAdd()
    {
        return view( 'admin.shareChAdd' );
    }
    public function shareAll()
    {
        return view( 'admin.shareAll' );
    }
    public function shareAdd()
    {
        return view( 'admin.shareAdd' );
    }

}
