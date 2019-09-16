<?php
/**
 * News Controller
 */

namespace App\Http\Controllers;

use App\Models\Events;
use App\Models\News;
use Illuminate\Http\Request;

/**
 * news Page Controller
 * @package App\Http\Controllers
 */
class NewsController extends Controller
{
    /** @var Events events model instance */
    private $eventsModel;

    /** @var News news model instance */
    private $newsModel;

    /**
     * LearnController constructor.
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
     * Display news page.
     *
     * @param Request $request Request object
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\JsonResponse|\Illuminate\View\View
     */
    public function index( Request $request )
    {
        $data['allList'] = $this->newsModel->getNewsAllList( $request );
        $data['events']  = $this->eventsModel->getEventsForSidebar( $request );

        if( $request->ajax() ){
            return response()->json( [
                                         'data' => view( 'news.list', compact( 'data' ) )->render(),
                                     ] );
        }

        return view( 'news.index', compact( 'data' ) );
    }

    /**
     * Display news detail page.
     *
     * @param News    $news    News model
     * @param Request $request Request object
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View News detail view
     */
    public function detail( News $news, Request $request )
    {
        $data  = $this->newsModel->getNewsDetail( $news );
        $other = $this->newsModel->getHomeNewsList( $request );

        return view( 'news.detail', compact( 'data', 'other' ) );
    }
}
