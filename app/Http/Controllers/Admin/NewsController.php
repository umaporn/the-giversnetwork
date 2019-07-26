<?php

namespace App\Http\Controllers\Admin;

use App\Models\News;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\NewsRequest;

class NewsController extends Controller
{
    /** @var News News model */
    protected $newsModel;

    /**
     * NewsController constructor.
     *
     */
    public function __construct( News $news )
    {
        $this->newsModel = $news;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index( Request $request )
    {
        $news = $this->newsModel->getNewsAllListForAdmin( $request );

        return view( 'admin.news.index', compact( 'news' ) );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view( 'admin.news.create' );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store( NewsRequest $request )
    {
        $result = $this->newsModel->createNews( $request );

        return $this->setUpdateOrCreationResponse( $request, $result );
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show( $id )
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param News $news News model
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View Edition news page
     */
    public function edit( News $news )
    {
        return view( 'admin.news.edit', compact( 'news' ) );
    }

    /**
     * Updating news information.
     *
     * @param NewsRequest $request News request object
     * @param News        $news    News model
     *
     * @return \Illuminate\Http\JsonResponse Updating response
     */
    public function update( NewsRequest $request, News $news )
    {
        $response = $this->newsModel->updateNewsInformation( $request, $news );

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
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy( Request $request, News $news )
    {
        $success = $news->deleteNews();

        if( $request->ajax() ){
            return response()->json( [
                                         'success'       => $success,
                                         'message'       => __( 'news_admin.news_management.remove_news_success' ),
                                         'redirectedUrl' => route( 'admin.news.index' ),
                                     ] );
        }
    }

    /**
     * Set update or creation response.
     *
     * @param Request $request Request object
     * @param array   $result  Updating or creating result
     *
     * @return    \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse
     */
    private function setUpdateOrCreationResponse( NewsRequest $request, array $result )
    {
        $response = $this->setResponseMessages( $result );

        if( $request->ajax() ){
            return response()->json( $response );
        } else {
            return redirect()->route( 'admin.news.index' );
        }
    }

    /**
     * Set error messages from result.
     *
     * @param array $result Result of saved news
     *
     * @return array Error messages
     */
    private function setResponseMessages( array $result )
    {

        if( !$result['successForNews'] && !$result['successForNewsImage'] ){
            $data = [
                'success' => false,
                'error'   => __( 'news_admin.saved_news_error' ),
            ];
        } else {
            $data = [
                'success'       => true,
                'message'       => __( 'news_admin.saved_news_success' ),
                'redirectedUrl' => route( 'admin.news.index' ),
            ];
        }

        return $data;
    }

}
