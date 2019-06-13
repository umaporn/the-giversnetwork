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
     * Show share page.
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
    /**
     * Show give page.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View give page
     */
    public function giveAdd()
    {
        return view( 'admin.giveAdd' );
    }
    public function giveAll()
    {
        return view( 'admin.giveAll' );
    }
    public function recAll()
    {
        return view( 'admin.recAll' );
    }
    /**
     * Show event page.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View event page
     */
    public function eventAdd()
    {
        return view( 'admin.eventAdd' );
    }
    public function eventAll()
    {
        return view( 'admin.eventAll' );
    }
    /**
     * Show news page.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View news page
     */
    public function newsAdd()
    {
        return view( 'admin.newsAdd' );
    }
    public function newsAll()
    {
        return view( 'admin.newsAll' );
    }
    /**
     * Show organization page.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View organization page
     */
    public function organizationAdd()
    {
        return view( 'admin.organizationAdd' );
    }
    public function organizationAll()
    {
        return view( 'admin.organizationAll' );
    }
    /**
     * Show user page.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View user page
     */
    public function userAll()
    {
        return view( 'admin.userAll' );
    }
}
