<?php
/**
 * Learn Controller
 */

namespace App\Http\Controllers;

use App\Models\Events;
use App\Models\Learn;
use App\Models\LearnInterestIn;
use App\Models\News;
use Illuminate\Http\Request;
use App\Models\InterestIn;

/**
 * Learn Page Controller
 * @package App\Http\Controllers
 */
class LearnController extends Controller
{
    /** @var Learn learn model instance */
    private $learnModel;

    /** @var Events events model instance */
    private $eventsModel;

    /** @var News news model instance */
    private $newsModel;

    /** @var LearnInterestIn LearnInterestIn model */
    private $learnInterestInModel;

    /** @var InterestIn InterestIn model */
    private $interestInModel;

    /**
     * LearnController constructor.
     *
     * @param Learn  $learn  Learn model
     * @param Events $events Events model
     * @param News   $news   News model
     */
    public function __construct( Learn $learn, Events $events, News $news, LearnInterestIn $learnInterestIn, InterestIn $interestIn )
    {
        $this->learnModel           = $learn;
        $this->eventsModel          = $events;
        $this->newsModel            = $news;
        $this->learnInterestInModel = $learnInterestIn;
        $this->interestInModel      = $interestIn;
    }

    /**
     * Display learn page.
     *
     * @param Request $request Request Object
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\JsonResponse|\Illuminate\View\View Learn page
     */
    public function index( Request $request )
    {
        $data['mostPopular'] = $this->learnModel->getLearnMostPopular( $request );
        $data['allList']     = $this->learnModel->getLearnAllList( $request );
        $data['events']      = $this->eventsModel->getEventsForSidebar( $request );
        $data['news']        = $this->newsModel->getNewsForSidebar( $request );

        if( $request->ajax() ){
            return response()->json( [
                                         'data' => view( 'learn.list', compact( 'data' ) )->render(),
                                     ] );
        }

        return view( 'learn.index', compact( 'data' ) );
    }

    /**
     * Get learn list.
     *
     * @param Request $request Request Object
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getLearnList( Request $request )
    {
        $data['allList'] = $this->learnModel->getLearnAllList( $request );

        return view( 'learn.list', compact( 'data' ) );
    }

    /**
     * Display learn detail page.
     *
     * @param Learn   $learn   Learn Model
     * @param Request $request Request object
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View Learn detail page
     */
    public function detail( Learn $learn, Request $request )
    {
        $data                = $this->learnModel->getLearnDetail( $learn );
        $other               = $this->learnModel->getHomeLearnList( $request, '3' );
        $learnInterestInList = $this->learnInterestInModel->getLearnInterestInList( $learn->id );

        return view( 'learn.detail', compact( 'data', 'other', 'learnInterestInList' ) );
    }
}
