<?php
/**
 * Events Controller
 */

namespace App\Http\Controllers;

use App\Models\Events;
use App\Models\News;
use Illuminate\Http\Request;

/**
 * Events Page Controller
 * @package App\Http\Controllers
 */
class EventsController extends Controller
{

    /** @var Events events model instance */
    private $eventsModel;

    /** @var News News model instance */
    private $newsModel;

    /**
     * EventsController constructor.
     *
     * @param Events $events Events model
     * @param News   $news   News model
     */
    public function __construct( Events $events, News $news )
    {
        $this->eventsModel = $events;
        $this->newsModel   = $news;
    }

    /**
     * Display events page.
     *
     * @param Request $request Request Object
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\JsonResponse|\Illuminate\View\View Learn page
     */
    public function index( Request $request )
    {
        $data['upComing'] = $this->eventsModel->getUpComingEvents( $request );
        $data['allList']  = $this->eventsModel->getAllListEvents( $request );
        $data['news']     = $this->newsModel->getNewsForLearnPageSidebar( $request );

        if( $request->ajax() ){
            return response()->json( [
                                         'data' => view( 'events.list', compact( 'data' ) )->render(),
                                     ] );
        }

        return view( 'events.index', compact( 'data' ) );
    }

    /**
     * Display events detail page.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View Events detail page
     */
    public function detail( Events $events, Request $request )
    {
        $data  = $this->eventsModel->getEventsDetail( $events );
        $other = $this->eventsModel->getHomeEventsList( $request );

        return view( 'events.detail', compact( 'data', 'other' ) );
    }
}
