<?php
/**
 * Events Page Controller
 */

namespace App\Http\Controllers;

use App\Support\Facades\PasswordGrant;

/**
 * Events Page Controller
 * @package App\Http\Controllers
 */
class EventsController extends Controller
{
    /**
     * Display events page.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View Events page
     */
    public function index()
    {
        return view( 'events.index' );
    }
     /**
     * Display article page.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View Article page
     */
    public function article()
    {
        return view( 'events.article' );
    }
}
