<?php
/**
 * Admin Share Page Controller
 */

namespace App\Http\Controllers\Admin;

use App\Models\InterestIn;
use App\Models\Share;
use App\Models\ShareInterestIn;
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

    /** @var InterestIn InterestIn model */
    protected $interestInModel;

    /** @var ShareInterestIn ShareInterestIn model */
    protected $shareInterestInModel;

    /**
     * ShareController constructor.
     */
    public function __construct( Share $share, InterestIn $interestIn, ShareInterestIn $shareInterestIn )
    {
        $this->shareModel           = $share;
        $this->interestInModel      = $interestIn;
        $this->shareInterestInModel = $shareInterestIn;
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request Request object
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View Share index view
     */
    public function index( Request $request )
    {
        $share = $this->shareModel->getShareAllListForAdmin( $request );

        return view( 'admin.share.index', compact( 'share' ) );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View Creation view
     */
    public function create()
    {
        $interestList = $this->interestInModel->getInterestInList();

        return view( 'admin.share.create', compact( 'interestList' ) );
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
     * @param Request $request Request object
     * @param Share   $share   Share model
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy( Request $request, Share $share )
    {
        $success = $share->deleteShare();

        if( $request->ajax() ){
            return response()->json( [
                                         'success'       => $success,
                                         'message'       => __( 'share_admin.share_management.remove_share_success' ),
                                         'redirectedUrl' => route( 'admin.share.index' ),
                                     ] );
        }
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
