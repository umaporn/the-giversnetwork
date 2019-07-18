<?php
/**
 * Admin Share Page Controller
 */

namespace App\Http\Controllers\Admin;

use App\Models\Share;
use App\Models\Challenge;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ShareRequest;

/**
 * Admin Share Page Controller
 * @package App\Http\Controllers
 */
class ShareController extends Controller
{
    /** @var Share Share model */
    protected $shareModel;

    /** @var Challenge Challenge model */
    protected $challengeModel;

    /**
     * ShareController constructor.
     */
    public function __construct( Share $share, Challenge $challenge )
    {
        $this->shareModel     = $share;
        $this->challengeModel = $challenge;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index( Request $request )
    {
        $share = $this->shareModel->getShareAllListForAdmin( $request );

        return view( 'admin.share.index', compact( 'share' ) );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view( 'admin.share.create' );
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
    public function store( ShareRequest $request )
    {
        $result = $this->shareModel->createShareForAdmin( $request );

        return $this->setUpdateOrCreationResponse( $request, $result );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Share $share
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit( Share $share )
    {
        return view( 'admin.share.edit', compact( 'share' ) );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ShareRequest $request Request object
     * @param Share        $share   Share model
     *
     * @return \Illuminate\Http\JsonResponse Updating response
     */
    public function update( ShareRequest $request, Share $share )
    {
        $response = $this->shareModel->updateShareInformation( $request, $share );

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
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id )
    {
        //
    }

    /**
     * Set update or creation response.
     *
     * @param ShareRequest $request Request object
     * @param array        $result  Updating or creating result
     *
     * @return    \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse
     */
    private function setUpdateOrCreationResponse( ShareRequest $request, array $result )
    {
        $response = $this->setResponseMessages( $result );

        if( $request->ajax() ){
            return response()->json( $response );
        } else {
            return redirect()->route( 'admin.share.index' );
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

        if( !$result['successForShare'] && !$result['successForShareImage'] ){
            $data = [
                'success' => false,
                'error'   => __( 'share_admin.saved_share_error' ),
            ];
        } else {
            $data = [
                'success'       => true,
                'message'       => __( 'share_admin.saved_share_success' ),
                'redirectedUrl' => route( 'admin.share.index' ),
            ];
        }

        return $data;
    }
}
