<?php
/**
 * Admin Challenge Page Controller
 */

namespace App\Http\Controllers\Admin;

use App\Models\Challenge;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ChallengeRequest;

/**
 * Admin Challenge Page Controller
 * @package App\Http\Controllers
 */
class ChallengeController extends Controller
{
    /** @var Challenge Challenge model */
    protected $challengeModel;

    /**
     * ChallengeController constructor.
     */
    public function __construct( Challenge $challenge )
    {
        $this->challengeModel = $challenge;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index( Request $request )
    {
        $challenge = $this->challengeModel->getChallengeAllListForAdmin( $request );

        return view( 'admin.challenge.index', compact( 'challenge' ) );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view( 'admin.challenge.create' );
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function challenge( Request $request )
    {
        $challenge = $this->challengeModel->getChallengeAllListForAdmin( $request );

        return view( 'admin.challenge.index', compact( 'challenge' ) );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function challengeCreate()
    {
        return view( 'admin.challenge.create' );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse Creation response
     */
    public function store( ChallengeRequest $request )
    {
        $result = $this->challengeModel->createChallengeForAdmin( $request );

        return $this->setUpdateOrCreationResponse( $request, $result );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Challenge $challenge
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit( Challenge $challenge )
    {
        return view( 'admin.challenge.edit', compact( 'challenge' ) );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ChallengeRequest $request Request object
     * @param Challenge        $challenge   Challenge model
     *
     * @return \Illuminate\Http\JsonResponse Updating response
     */
    public function update( ChallengeRequest $request, Challenge $challenge )
    {
        $response = $this->challengeModel->updateChallengeInformation( $request, $challenge );

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
     * Remove the specified resource from storage.
     *
     * @param Request $request Request object
     * @param Challenge   $challenge   Challenge model
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy( Request $request, Challenge $challenge )
    {
        $success = $challenge->deleteChallenge();

        if( $request->ajax() ){
            return response()->json( [
                                         'success'       => $success,
                                         'message'       => __( 'challenge_admin.challenge_management.remove_challenge_success' ),
                                         'redirectedUrl' => route( 'admin.challenge.index' ),
                                     ] );
        }
    }

    /**
     * Set update or creation response.
     *
     * @param ChallengeRequest $request Request object
     * @param array        $result  Updating or creating result
     *
     * @return    \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse
     */
    private function setUpdateOrCreationResponse( ChallengeRequest $request, array $result )
    {
        $response = $this->setResponseMessages( $result );

        if( $request->ajax() ){
            return response()->json( $response );
        } else {
            return redirect()->route( 'admin.challenge.index' );
        }
    }

    /**
     * Set error messages from result.
     *
     * @param array $result Result of saved challenge
     *
     * @return array Error messages
     */
    private function setResponseMessages( array $result )
    {

        if( !$result['successForChallenge'] && !$result['successForChallengeImage'] ){
            $data = [
                'success' => false,
                'error'   => __( 'challenge_admin.saved_challenge_error' ),
            ];
        } else {
            $data = [
                'success'       => true,
                'message'       => __( 'challenge_admin.saved_challenge_success' ),
                'redirectedUrl' => route( 'admin.challenge.index' ),
            ];
        }

        return $data;
    }
}
