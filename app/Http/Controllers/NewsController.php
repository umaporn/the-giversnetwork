<?php
/**
 * News Controller
 */
namespace App\Http\Controllers;

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
}
