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
        $data['news']      = $this->newsModel->getNewsForSidebar( $request );
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
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View Share detail page
     */
    public function detail( Share $share, Request $request )
    {
        $data  = $this->shareModel->getShareDetail( $share );
        $other = $this->shareModel->getShareAllList( $request, 6 );

        return view( 'share.detail', compact( 'data', 'other' ) );
    }

    public function createThread()
    {
        return view( 'share.create_thread' );
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

}
