<?php

namespace App\Http\Controllers\Admin;

use App\Models\Events;
use App\Http\Requests\EventsRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EventsController extends Controller
{
    /** @var Events Events model */
    protected $eventsModel;

    /**
     * GiveController constructor.
     */
    public function __construct( Events $events )
    {
        $this->eventsModel = $events;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index( Request $request )
    {
        $events = $this->eventsModel->getEventsAllListForAdmin( $request );

        return view( 'admin.events.index', compact( 'events' ) );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view( 'admin.events.create' );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request Request object
     *
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse Creation response
     */
    public function store( EventsRequest $request )
    {
        $result = $this->eventsModel->createEvents( $request );

        return $this->setUpdateOrCreationResponse( $request, $result );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Events $events Events model
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View Events edition page
     */
    public function edit( Events $event )
    {
        return view( 'admin.events.edit', compact( 'event' ) );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param EventsRequest $request Request object
     * @param Events        $event   Events model
     *
     * @return \Illuminate\Http\JsonResponse Update response
     */
    public function update( EventsRequest $request, Events $event )
    {
        $response = $this->eventsModel->updateEventsInformation( $request, $event );

        if( !$response['success'] ){
            return response()->json( $response, 422 );
        }

        return response()->json( [
                                     'success'       => $response['success'],
                                     'message'       => $response['message'],
                                     'redirectedUrl' => url()->previous(),
                                 ] );
    }

    /**
     * Delete a specific events.
     *
     * @param Request $request Request object
     * @param Events  $events  Events model
     *
     * @return    \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    public function destroy( Request $request, Events $event )
    {
        $success = $event->delete();

        if( $request->ajax() ){
            return response()->json( [
                                         'success'       => $success,
                                         'message'       => __( 'events_admin.events_management.remove_events_success' ),
                                         'redirectedUrl' => route( 'admin.events.index' ),
                                     ] );
        }
    }

    /**
     * Set update or creation response.
     *
     * @param EventsRequest $request Request object
     * @param array         $result  Updating or creating result
     *
     * @return    \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse
     */
    private function setUpdateOrCreationResponse( EventsRequest $request, array $result )
    {
        $response = $this->setResponseMessages( $result );

        if( $request->ajax() ){
            return response()->json( $response );
        } else {
            return redirect()->route( 'admin.events.index' );
        }
    }

    /**
     * Set error messages from result.
     *
     * @param array $result Result of saved events
     *
     * @return array Error messages
     */
    private function setResponseMessages( array $result )
    {

        if( !$result['successForEvents'] && !$result['successForEventsImage'] ){
            $data = [
                'success' => false,
                'error'   => __( 'events_admin.saved_events_error' ),
            ];
        } else {
            $data = [
                'success'       => true,
                'message'       => __( 'events_admin.saved_events_success' ),
                'redirectedUrl' => route( 'admin.events.index' ),
            ];
        }

        return $data;
    }
}
