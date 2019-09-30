<?php
/**
 * Admin Give Page Controller
 */

namespace App\Http\Controllers\Admin;

use App\Http\Requests\GiveRequest;
use App\Models\Give;
use App\Models\GiveCategory;
use App\Models\GiveImage;
use App\Models\GiveInterestIn;
use App\Models\InterestIn;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

/**
 * Admin Give Page Controller
 * @package App\Http\Controllers
 */
class GiveController extends Controller
{
    /** @var Give Give model */
    protected $giveModel;

    /** @var GiveImage Give Image model */
    protected $giveImageModel;

    /** @var GiveCategory Give Category model */
    protected $giveCategoryModel;

    /** @var InterestIn InterestIn model */
    protected $interestInModel;

    /** @var GiveInterestIn GiveInterestIn model */
    protected $giveInterestInModel;

    /**
     * GiveController constructor.
     */
    public function __construct( Give $give, GiveImage $giveImage, GiveCategory $giveCategory, InterestIn $interestIn, GiveInterestIn $giveInterestIn )
    {
        $this->giveModel           = $give;
        $this->giveImageModel      = $giveImage;
        $this->giveCategoryModel   = $giveCategory;
        $this->interestInModel     = $interestIn;
        $this->giveInterestInModel = $giveInterestIn;
    }

    /**
     * Display a listing of give.
     *
     * @param Request $request Request object
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View Give page
     */
    public function index( Request $request )
    {
        $give = $this->giveModel->getGiveAllListForAdmin( $request );

        return view( 'admin.give.index', compact( 'give' ) );
    }

    /**
     * Display a listing of receive.
     *
     * @param Request $request Request object
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View Receive page
     */
    public function receive( Request $request )
    {
        $give = $this->giveModel->getReceiveAllListForAdmin( $request );

        return view( 'admin.give.index', compact( 'give' ) );
    }

    /**
     * Show the form for creating a new give.
     *
     * @return \Illuminate\Http\Response Give creation page
     */
    public function create()
    {
        $data['giveCategory'] = $this->giveCategoryModel->getGiveCategoryList();
        $interestList         = $this->interestInModel->getInterestInList();

        return view( 'admin.give.create', compact( 'data', 'interestList' ) );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param GiveRequest $request Request object
     *
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse
     */
    public function store( GiveRequest $request )
    {
        $result = $this->giveModel->createGiveForAdmin( $request );

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
            return redirect()->route( 'admin.give.index' );
        }
    }

    /**
     * Set error messages from result.
     *
     * @param array $result Result of saved give
     *
     * @return array Error messages
     */
    private function setResponseMessages( array $result )
    {

        if( !$result['successForGive'] && !$result['successForGiveImage'] ){
            $data = [
                'success' => false,
                'error'   => __( 'give_admin.saved_give_error' ),
            ];
        } else {
            $data = [
                'success'       => true,
                'message'       => __( 'give_admin.saved_give_success' ),
                'redirectedUrl' => route( 'admin.give.index' ),
            ];
        }

        return $data;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Give $give Give model
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View Edit form
     */
    public function edit( Give $give )
    {
        $data['giveCategory'] = $this->giveCategoryModel->getGiveCategoryList();
        $give                 = $this->giveModel->getGiveDetail( $give );
        $interestList         = $this->interestInModel->getInterestInList();
        $giveInterestInList   = $this->giveInterestInModel->getGiveInterestInList( $give->id );

        return view( 'admin.give.edit', compact( 'give', 'data', 'interestList', 'giveInterestInList' ) );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param GiveRequest $request Request object
     * @param Give        $give    Give model
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function update( GiveRequest $request, Give $give )
    {
        $response = $this->giveModel->updateGiveInformation( $request, $give );

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
     * Delete a specific give.
     *
     * @param Request $request Request object
     * @param Give    $give    Give model
     *
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function destroy( Request $request, Give $give )
    {
        $success = $give->deleteGive();

        if( $request->ajax() ){
            return response()->json( [
                                         'success'       => $success,
                                         'message'       => __( 'give_admin.give_management.remove_give_success' ),
                                         'redirectedUrl' => route( 'admin.give.index' ),
                                     ] );
        }
    }
}
