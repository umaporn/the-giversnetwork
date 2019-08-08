<?php
/**
 * Admin Learn Page Controller
 */

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Learn;
use App\Http\Requests\LearnRequest;
use Illuminate\Http\Request;

/**
 * Admin Learn Page Controller
 * @package App\Http\Controllers
 */
class LearnController extends Controller
{
    /** @var Learn Learn model */
    protected $learnModel;

    /**
     * LearnController constructor.
     *
     */
    public function __construct( Learn $learn )
    {
        $this->learnModel = $learn;
    }

    /**
     * Display admin learn page.
     *
     * @param Request $request Request object
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View Learn page
     */
    public function index( Request $request )
    {
        $learns = $this->learnModel->getLearnAllListForAdmin( $request );

        return view( 'admin.learn.index', compact( 'learns' ) );
    }

    /**
     * Display admin learn highlight page.
     *
     * @param Request $request Request object
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View Learn page
     */
    public function highlight( Request $request )
    {
        $learn_highlight = $this->learnModel->getLearnHighlightListForAdmin( $request );

        return view( 'admin.learn.highlight', compact( 'learn_highlight' ) );
    }

    /**
     * Display admin learn edition form.
     *
     * @param Learn $learn Learn model
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View Learn edition form
     */
    public function edit( Learn $learn )
    {
        return view( 'admin.learn.edit', compact( 'learn' ) );
    }

    /**
     * Display admin learn creation form.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View Learn creation form
     */
    public function create()
    {
        return view( 'admin.learn.create' );
    }

    /**
     * Creating learn information.
     *
     * @param LearnRequest $request Learn request object
     *
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse Response information
     */
    public function store( LearnRequest $request )
    {
        $result = $this->learnModel->createLearn( $request );

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
            return redirect()->route( 'admin.learn.index' );
        }
    }

    /**
     * Set error messages from result.
     *
     * @param array $result Result of saved learn
     *
     * @return array Error messages
     */
    private function setResponseMessages( array $result )
    {

        if( !$result['successForLearn'] && !$result['successForLearnImage'] ){
            $data = [
                'success' => false,
                'error'   => __( 'learn_admin.saved_learn_error' ),
            ];
        } else {
            $data = [
                'success'       => true,
                'message'       => __( 'learn_admin.saved_learn_success' ),
                'redirectedUrl' => route( 'learn.index' ),
            ];
        }

        return $data;
    }

    /**
     * Updating learn information.
     *
     * @param LearnRequest $request Learn request object
     * @param Learn        $learn   Learn model
     *
     * @return \Illuminate\Http\JsonResponse Updating response
     */
    public function update( LearnRequest $request, Learn $learn )
    {
        $response = $this->learnModel->updateLearnInformation( $request, $learn );

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
     * Delete a specific learn.
     *
     * @param Request $request Request object
     * @param Learn   $learn   Learn model
     *
     * @return    \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    public function destroy( Request $request, Learn $learn )
    {
        $success = $learn->delete();

        if( $request->ajax() ){
            return response()->json( [
                                         'success'       => $success,
                                         'message'       => __( 'learn_admin.learn_management.remove_learn_success' ),
                                         'redirectedUrl' => route( 'admin.learn.index' ),
                                     ] );
        }
    }

}
