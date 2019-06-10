<?php
/**
 * news Page Controller
 */

namespace App\Http\Controllers;

use App\Support\Facades\PasswordGrant;

/**
 * news Page Controller
 * @package App\Http\Controllers
 */
class NewsController extends Controller
{
    /**
     * Display news page.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View news page
     */
    public function index()
    {
        return view( 'news.index' );
    }
     /**
     * Display article page.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View Article page
     */
    public function article()
    {
        return view( 'news.article' );
    }
}
