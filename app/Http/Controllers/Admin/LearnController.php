<?php
/**
 * Admin Learn Page Controller
 */

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Learn;
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
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View Learn page
     */
    public function index( Learn $learn, Request $request )
    {
        $learns = $this->learnModel->getLearnAllList( $request );

        return view( 'admin.learn.index', compact('learns') );
    }
}
