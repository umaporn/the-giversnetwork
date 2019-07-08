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
        $learns = $this->learnModel->getLearnAllList( $request );

        return view( 'admin.learn.index', compact( 'learns' ) );
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

}
