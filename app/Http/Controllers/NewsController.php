<?php
/**
 * News Controller
 */

namespace App\Http\Controllers;

use App\Models\News;

class NewsController extends Controller
{
    /**
     * Display news page.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View News page
     */
    public function index()
    {
        return view( 'news.index' );
    }

    /**
     * Display news detail page.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View News detail page
     */
    public function detail( News $news )
    {
        //return view( 'news.detail' );
    }
}
