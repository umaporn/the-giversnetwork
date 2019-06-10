<?php
/**
 * Challenge Controller
 */

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Challenge;
use App\Models\Events;
use Illuminate\Http\Request;

class ChallengeController extends Controller
{
    /** @var Challenge challenge model instance */
    private $challengeModel;

    /** @var News News model instance */
    private $newsModel;

    /** @var Events Events model instance */
    private $eventsModel;

    /**
     * ChallengeController constructor.
     *
     * @param Challenge $challenge Challenge Model
     */
    public function __construct( Challenge $challenge, News $news, Events $events )
    {
        $this->challengeModel = $challenge;
        $this->newsModel      = $news;
        $this->eventsModel    = $events;
    }

    /**
     * Display challenge page.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View Challenge page
     */
    public function index( Request $request )
    {
        $data['news']      = $this->newsModel->getNewsForSidebar( $request );
        $data['events']    = $this->eventsModel->getEventsForSidebar( $request );
        $data['challenge'] = $this->challengeModel->getChallengeAllList( $request );

        if( $request->ajax() ){
            return response()->json( [
                                         'data' => view( 'challenge.list', compact( 'data' ) )->render(),
                                     ] );
        }

        return view( 'challenge.index', compact( 'data' ) );
    }

    /**
     * Display challenge detail page.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View Challenge detail page
     */
    public function detail( Challenge $challenge, Request $request )
    {
        $data  = $this->challengeModel->getChallengeDetail( $challenge );
        $other = $this->challengeModel->getChallengeAllList( $request, 6 );

        return view( 'challenge.detail', compact( 'data', 'other' ) );
    }

    public function createThread()
    {
        return view( 'challenge.create_thread' );
    }

    /**
     * Display challenge detail page.
     * /**
     * Display challenge page.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View Challenge page
     */
    public function challenge()
    {
        return view( 'challenge.challenge' );
    }

}
