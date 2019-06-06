<?php
/**
 * Give Page Controller
 */

namespace App\Http\Controllers;

use App\Support\Facades\PasswordGrant;

/**
 * Give Page Controller
 * @package App\Http\Controllers
 */
class GiveController extends Controller
{
    /**
     * Display give page.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View Give page
     */
    public function index()
    {
        return view( 'give.index' );
    }
     /**
     * Display article page.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View Article page
     */
    public function article()
    {
        return view( 'give.article' );
    }

    /**
     * Display add-item page.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View AddItem page
     */
    public function addItem()
    {
        return view( 'give.addItem' );
    }
}
