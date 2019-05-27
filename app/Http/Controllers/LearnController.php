<?php
/**
 * Learn Controller
 */

namespace App\Http\Controllers;

use App\Models\Learn;
use Illuminate\Http\Request;

/**
 * Learn Page Controller
 * @package App\Http\Controllers
 */
class LearnController extends Controller
{
    /** @var Learn learn model instance */
    private $learnModel;

    public function __construct( Learn $learn )
    {
        $this->learnModel = $learn;
    }

    /**
     * Display learn page.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View Learn page
     */
    public function index( Request $request )
    {
        $data['mostPopular'] = $this->learnModel->getLearnMostPopular( $request );
        $data['allList']     = $this->learnModel->getLearnAllList( $request );

        return view( 'learn.index', compact( 'data' ) );
    }

    /**
     * Display learn detail page.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View Learn detail page
     */
    public function detail()
    {
        return view( 'learn.detail' );
    }
}
