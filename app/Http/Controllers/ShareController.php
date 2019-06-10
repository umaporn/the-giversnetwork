<?php
/**
 * Share Controller
 */

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Share;
use App\Models\ShareLike;
use App\Models\ShareComment;
use App\Models\Challenge;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShareController extends Controller
{
    /** @var Share share model instance */
    private $shareModel;

    /** @var Challenge challenge model instance */
    private $challengeModel;

    /** @var News News model instance */
    private $newsModel;

    /** @var ShareLike Share like model instance */
    private $shareLikeModel;

    /** @var ShareComment Share comment model instance */
    private $shareCommentModel;

    /**
     * ShareController constructor.
     *
     * @param Share     $share     Share Model
     * @param Challenge $challenge Challenge Model
     */
    public function __construct( Share $share, Challenge $challenge, News $news, ShareLike $shareLike, ShareComment $shareComment )
    {
        $this->shareModel        = $share;
        $this->challengeModel    = $challenge;
        $this->newsModel         = $news;
        $this->shareLikeModel    = $shareLike;
        $this->shareCommentModel = $shareComment;
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
        $data    = $this->shareModel->getShareDetail( $share );
        $other   = $this->shareModel->getShareAllList( $request, 6 );
        $isLike  = $this->shareLikeModel->getIsShareLike( $share );
        $comment = $this->shareCommentModel->getShareComment( $share );

        return view( 'share.detail', compact( 'data', 'other', 'isLike', 'comment' ) );
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

    public function saveLike( Request $request, Share $share )
    {
        if( $request->ajax() ){

            $isLike = $this->shareLikeModel->getIsShareLike( $share );

            if( $isLike ){
                $this->shareLikeModel->where( [
                                                  'fk_user_id'  => $request->input( 'fk_user_id' ),
                                                  'fk_share_id' => $request->input( 'fk_share_id' ),
                                              ] )->delete();
            } else {
                $this->shareLikeModel->create( $request->input() );

            }

            $isLike = $this->shareLikeModel->getIsShareLike( $share );
            $data   = $this->shareModel->getShareDetail( $share );

            return response()->json( [
                                         'data' => view( 'share.like', compact( 'data', 'isLike' ) )->render(),
                                     ] );
        }
    }

}
