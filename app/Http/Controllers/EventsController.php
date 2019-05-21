<?php
/**
 * Events Controller
 */
namespace App\Http\Controllers;

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
}
