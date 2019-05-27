<?php
/**
 * Events Controller
 */

namespace App\Http\Controllers;

use App\Models\Events;
use Illuminate\Http\Request;

class EventsController extends Controller
{
    /**
     * Display events page.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View Events page
     */
    public function index()
    {
        return view( 'event.index' );
    }

    /**
     * Display events detail page.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View Events detail page
     */
    public function detail( Events $events )
    {
        //return view( 'events.detail' );
    }
}
