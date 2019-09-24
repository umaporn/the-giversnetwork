<?php
/**
 * Events Controller
 */

namespace App\Http\Controllers;

use App\Http\Requests\EventsRegistrationRequest;
use App\Models\Events;
use App\Models\EventsRegistration;
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

    /** @var EventsRegistration eventRegistration model instance */
    private $eventsRegistrationModel;

    /**
     * EventsController constructor.
     *
     * @param Events             $events            Events model
     * @param News               $news              News model
     * @param EventsRegistration $eventRegistration eventRegistration model
     */
    public function __construct( Events $events, News $news, EventsRegistration $eventsRegistration )
    {
        $this->eventsModel             = $events;
        $this->newsModel               = $news;
        $this->eventsRegistrationModel = $eventsRegistration;
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
        $data['upComing']   = $this->eventsModel->getUpComingEvents( $request );
        $data['pastEvents'] = $this->eventsModel->getPastEvents( $request );
        $data['allList']    = $this->eventsModel->getAllListEvents( $request );
        $data['news']       = $this->newsModel->getNewsForSidebar( $request );

        if( $request->ajax() ){
            return response()->json( [
                                         'data' => view( 'events.list', compact( 'data' ) )->render(),
                                     ] );
        }

        return view( 'events.index', compact( 'data' ) );
    }

    /**
     * Display events detail page
     *
     * @param Events  $events  Events Model
     * @param Request $request Request object
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View Events detail page
     */
    public function detail( Events $events, Request $request )
    {
        $data  = $this->eventsModel->getEventsDetail( $events );
        $other = $this->eventsModel->getHomeEventsList( $request, '3' );

        return view( 'events.detail', compact( 'data', 'other' ) );
    }

    /**
     * Show events registration page.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View Registration view
     */
    public function registration()
    {
        return view( 'events.registration.index' );
    }

    /**
     * Show events registration thank you page.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View Thank you view
     */
    public function thankyou()
    {
        return view( 'events.registration.thankyou' );
    }

    /**
     * Show events registration thank you fail page.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View Fail view
     */
    public function thankyouFail()
    {
        return view( 'events.registration.thankyou_fail' );
    }

    /**
     * Events registration creation.
     *
     * @param EventsRegistrationRequest $request Request Object
     *
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse
     */
    public function createEventsRegistration( EventsRegistrationRequest $request )
    {
        $result = $this->eventsRegistrationModel->createEventsRegistration( $request );

        return $this->setUpdateOrCreationResponse( $request, $result );
    }

    /**
     * Set update or creation response.
     *
     * @param Request $request Request object
     * @param array   $result  Updating or creating result
     *
     * @return    \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse
     */
    private function setUpdateOrCreationResponse( Request $request, array $result )
    {
        $response = $this->setResponseMessages( $result );

        if( $request->ajax() ){
            return response()->json( $response );
        } else {
            return redirect()->route( 'events.registration' );
        }
    }

    /**
     * Set error messages from result.
     *
     * @param array $result Result of saved share
     *
     * @return array Error messages
     */
    private function setResponseMessages( array $result )
    {

        if( !$result['successForEventsRegistration'] ){
            $data = [
                'success' => false,
                'error'   => __( 'event_registration.saved_error' ),
            ];
        } else {
            $data = [
                'success'       => true,
                'message'       => __( 'event_registration.saved_success' ),
            ];
        }

        return $data;
    }
}
