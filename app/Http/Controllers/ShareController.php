<?php
/**
 * Share Controller
 */

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Share;
use App\Models\Challenge;
use Illuminate\Http\Request;

class ShareController extends Controller
{
    /** @var Share share model instance */
    private $shareModel;

    /** @var Challenge challenge model instance */
    private $challengeModel;

    /** @var News News model instance */
    private $newsModel;

    /**
     * ShareController constructor.
     *
     * @param Share     $share     Share Model
     * @param Challenge $challenge Challenge Model
     */
    public function __construct( Share $share, Challenge $challenge, News $news )
    {
        $this->shareModel     = $share;
        $this->challengeModel = $challenge;
        $this->newsModel      = $news;
    }

    /**
     * Display share page.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View Share page
     */
    public function index( Request $request )
    {
        $data['challenge'] = $this->challengeModel->getChallengeList( $request );
        $data['news']      = $this->newsModel->getNewsForLearnPageSidebar( $request );
        $data['share']     = $this->shareModel->getShareAllList( $request );

        if( $request->ajax() ){
            return response()->json( [
                                         'data' => view( 'share.list', compact( 'data' ) )->render(),
                                     ] );
        }

        return view( 'share.index', compact( 'data' ) );
    }

    /**
     * Display share detail page.
     * /**
     * Display challenge page.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View Challenge page
     */
    public function challenge()
    {
        return view( 'share.challenge' );
    }

    /**
     * Display detail page.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View Article page
     */
    public function detail()
    {
        return view( 'share.detail' );
    }

    public function createThread()
    {
        return view( 'share.create_thread' );
    }
}
