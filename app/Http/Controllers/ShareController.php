<?php
/**
 * Share Controller
 */

namespace App\Http\Controllers;

use App\Models\Events;
use App\Models\News;
use App\Models\Share;
use App\Models\ShareLike;
use App\Models\ShareComment;
use App\Models\Challenge;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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

    /** @var Events Events model instance */
    private $eventsModel;

    /**
     * ShareController constructor.
     *
     * @param Share        $share        Share Model
     * @param Challenge    $challenge    Challenge Model
     * @param Events       $events       Events Model
     * @param News         $news         News Model
     * @param ShareLike    $shareLike    ShareLike Model
     * @param ShareComment $shareComment ShareComment Model
     */
    public function __construct( Share $share, Challenge $challenge, Events $events, News $news, ShareLike $shareLike, ShareComment $shareComment )
    {
        $this->shareModel        = $share;
        $this->challengeModel    = $challenge;
        $this->newsModel         = $news;
        $this->shareLikeModel    = $shareLike;
        $this->shareCommentModel = $shareComment;
        $this->eventsModel       = $events;
    }

    /**
     * Get a validator for an incoming share request.
     *
     * @param array $data
     *
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator( array $data )
    {
        return Validator::make( $data, [
            'comment_text' => config( 'validation.share.comment_text' ),
        ] );
    }

    /**
     * Display share page.
     *
     * @param Request $request Request object
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\JsonResponse|\Illuminate\View\View Share page
     * @throws \Throwable
     */
    public function index( Request $request )
    {
        $data['challenge'] = $this->challengeModel->getChallengeList( $request );
        $data['news']      = $this->newsModel->getNewsForSidebar( $request );
        $data['share']     = $this->shareModel->getShareAllList( $request );
        $data['events']    = $this->eventsModel->getEventsForSidebar( $request );

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
     * @param Share   $share   Share model
     * @param Request $request Request object
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\JsonResponse|\Illuminate\View\View Share detail page
     * @throws \Throwable
     */
    public function detail( Share $share, Request $request )
    {
        $data    = $this->shareModel->getShareDetail( $share );
        $other   = $this->shareModel->getShareAllList( $request, 7 )->except( [ 'id' => $share->id ] );
        $isLike  = $this->shareLikeModel->getIsShareLike( $share );
        $comment = $this->shareCommentModel->getShareComment( $request, $share );

        if( $request->ajax() ){
            return response()->json( [
                                         'data' => view( 'share.comment_list', compact( 'comment' ) )->render(),
                                     ] );
        }

        return view( 'share.detail', compact( 'data', 'other', 'isLike', 'comment' ) );
    }

    /**
     * Show creation thread form
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View Create thread form
     */
    public function showCreateThreadForm()
    {
        return view( 'share.create_thread' );
    }

    public function createThread( Request $request )
    {
        $result = $this->shareModel->createShare( $request );

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
            return redirect()->route( 'share.showCreateThreadForm' );
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
                'error'   => __( 'share.create_thread_form.saved_share_error' ),
            ];
        } else {
            $data = [
                'success'       => true,
                'message'       => __( 'share.create_thread_form.saved_share_success' ),
                'redirectedUrl' => route( 'share.index' ),
            ];
        }

        return $data;
    }

    /**
     * Save like for share content.
     *
     * @param Request $request Request Object
     * @param Share   $share   Share model
     *
     * @return \Illuminate\Http\JsonResponse Save like response
     * @throws \Throwable
     */
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

    /**
     * Save comment for share content.
     *
     * @param Request $request Request object
     * @param Share   $share   Share model
     *
     * @return \Illuminate\Http\JsonResponse Json response
     * @throws \Throwable
     */
    public function saveComment( Request $request, Share $share )
    {
        $this->validator( $request->input() )->validate();

        $response['success'] = false;

        if( $request->ajax() ){

            $result = $this->shareCommentModel->create( $request->input() );

            if( $result ){
                $response['success'] = true;
            } else {
                return response()->json( $response, 422 );
            }

            $comment = $this->shareCommentModel->getShareComment( $request, $share );
            $data    = $this->shareModel->getShareDetail( $share );

            return response()->json( [
                                         'data' => view( 'share.comment', compact( 'comment', 'data' ) )->render(),
                                     ] );
        }
    }

    /**
     * Get comment list.
     *
     * @param Request $request Request object
     * @param Share   $share   Share model
     *
     * @return \Illuminate\Http\JsonResponse Comment list
     * @throws \Throwable
     */
    public function getCommentList( Request $request, Share $share )
    {
        if( $request->ajax() ){
            $comment = $this->shareCommentModel->getShareComment( $request, $share );

            return response()->json( [
                                         'data' => view( 'share.comment_list', compact( 'comment' ) )->render(),
                                     ] );
        }
    }

    /**
     * Delete comment on share content.
     *
     * @param Request $request Request Object
     *
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse
     */
    public function deleteComment( Request $request )
    {

        $success = $this->shareCommentModel->where( [ 'id' => $request->input( 'id' ), ] )->delete();

        if( $success ){
            $response = [ 'success'       => true,
                          'message'       => __( 'share.comment.remove_comment_success' ),
                          'redirectedUrl' => url()->previous(),
            ];
        } else {
            $response = [ 'success'       => false,
                          'message'       => __( 'share.comment.remove_comment_fail' ),
                          'redirectedUrl' => url()->previous(),
            ];
        }

        return response()->json( $response );
    }
}
