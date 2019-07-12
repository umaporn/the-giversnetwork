<?php
/**
 * Challenge Controller
 */

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Challenge;
use App\Models\Events;
use App\Models\ChallengeComment;
use App\Models\ChallengeLike;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ChallengeController extends Controller
{
    /** @var Challenge challenge model instance */
    private $challengeModel;

    /** @var News News model instance */
    private $newsModel;

    /** @var Events Events model instance */
    private $eventsModel;

    /** @var ChallengeLike Challenge like model instance */
    private $challengeLikeModel;

    /** @var ChallengeComment Challenge comment model instance */
    private $challengeCommentModel;

    /**
     * ChallengeController constructor.
     *
     * @param Challenge        $challenge        Challenge Model
     * @param News             $news             News Model
     * @param Events           $events           Events Model
     * @param ChallengeLike    $challengeLike    ChallengeLike Model
     * @param ChallengeComment $challengeComment ChallengeComment Model
     */
    public function __construct( Challenge $challenge, News $news, Events $events, ChallengeLike $challengeLike, ChallengeComment $challengeComment )
    {
        $this->challengeModel        = $challenge;
        $this->newsModel             = $news;
        $this->eventsModel           = $events;
        $this->challengeLikeModel    = $challengeLike;
        $this->challengeCommentModel = $challengeComment;
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
            'comment_text' => config( 'validation.challenge.comment_text' ),
        ] );
    }

    /**
     * Display challenge page.
     *
     * @param Request $request Request object
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\JsonResponse|\Illuminate\View\View Challenge page
     * @throws \Throwable
     */
    public function index( Request $request )
    {
        $data['news']      = $this->newsModel->getNewsForSidebar( $request );
        $data['events']    = $this->eventsModel->getEventsForSidebar( $request );
        $data['challenge'] = $this->challengeModel->getChallengeAllList( $request );

        if( $request->ajax() ){
            return response()->json( [
                                         'data' => view( 'challenge.list', compact( 'data' ) )->render(),
                                     ] );
        }

        return view( 'challenge.index', compact( 'data' ) );
    }

    /**
     * Display challenge detail page.
     *
     * @param Challenge $challenge Challenge model
     * @param Request   $request   Request object
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\JsonResponse|\Illuminate\View\View Challenge detail
     *                                                                                                page
     * @throws \Throwable
     */
    public function detail( Challenge $challenge, Request $request )
    {

        $data    = $this->challengeModel->getChallengeDetail( $challenge );
        $other   = $this->challengeModel->getChallengeAllList( $request, 6 );
        $isLike  = $this->challengeLikeModel->getIsChallengeLike( $challenge );
        $comment = $this->challengeCommentModel->getChallengeComment( $request, $challenge );

        if( $request->ajax() ){
            return response()->json( [
                                         'data' => view( 'challenge.comment_list', compact( 'comment' ) )->render(),
                                     ] );
        }

        return view( 'challenge.detail', compact( 'data', 'other', 'isLike', 'comment' ) );
    }

    /**
     * Display challenge page.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View Challenge page
     */
    public function challenge()
    {
        return view( 'challenge.challenge' );
    }

    /**
     * Save like for challenge content.
     *
     * @param Request   $request   Request Object
     * @param Challenge $challenge Challenge model
     *
     * @return \Illuminate\Http\JsonResponse Save like response
     * @throws \Throwable
     */
    public function saveLike( Request $request, Challenge $challenge )
    {
        if( $request->ajax() ){

            $isLike = $this->challengeLikeModel->getIsChallengeLike( $challenge );

            if( $isLike ){
                $this->challengeLikeModel->where( [
                                                      'fk_user_id'      => $request->input( 'fk_user_id' ),
                                                      'fk_challenge_id' => $request->input( 'fk_challenge_id' ),
                                                  ] )->delete();
            } else {
                $this->challengeLikeModel->create( $request->input() );
            }

            $isLike = $this->challengeLikeModel->getIsChallengeLike( $challenge );
            $data   = $this->challengeModel->getChallengeDetail( $challenge );

            return response()->json( [
                                         'data' => view( 'challenge.like', compact( 'data', 'isLike' ) )->render(),
                                     ] );
        }
    }

    /**
     * Save comment for challenge content.
     *
     * @param Request   $request   Request object
     * @param Challenge $challenge Challenge model
     *
     * @return \Illuminate\Http\JsonResponse Json response
     * @throws \Throwable
     */
    public function saveComment( Request $request, Challenge $challenge )
    {
        $this->validator( $request->input() )->validate();

        $response['success'] = false;

        if( $request->ajax() ){

            $result = $this->challengeCommentModel->create( $request->input() );

            if( $result ){
                $response['success'] = true;
            } else {
                return response()->json( $response, 422 );
            }

            $comment = $this->challengeCommentModel->getChallengeComment( $request, $challenge );
            $data    = $this->challengeModel->getChallengeDetail( $challenge );

            return response()->json( [
                                         'data' => view( 'challenge.comment', compact( 'comment', 'data' ) )->render(),
                                     ] );
        }
    }

    /**
     * Get comment list.
     *
     * @param Request   $request   Request object
     * @param Challenge $challenge Challenge model
     *
     * @return \Illuminate\Http\JsonResponse Comment list
     * @throws \Throwable
     */
    public function getCommentList( Request $request, Challenge $challenge )
    {
        if( $request->ajax() ){
            $comment = $this->challengeCommentModel->getChallengeComment( $request, $challenge );

            return response()->json( [
                                         'data' => view( 'challenge.comment_list', compact( 'comment' ) )->render(),
                                     ] );
        }
    }

    /**
     * Delete comment on challenge content.
     *
     * @param Request $request Request object
     *
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse
     */
    public function deleteComment( Request $request )
    {

        $success = $this->challengeCommentModel->where( [ 'id' => $request->input( 'id' ), ] )->delete();

        if( $success ){
            $response = [ 'success'       => true,
                          'message'       => __( 'challenge.comment.remove_comment_success' ),
                          'redirectedUrl' => url()->previous(),
            ];
        } else {
            $response = [ 'success'       => false,
                          'message'       => __( 'challenge.comment.remove_comment_fail' ),
                          'redirectedUrl' => url()->previous(),
            ];
        }

        return response()->json( $response );

    }
}
