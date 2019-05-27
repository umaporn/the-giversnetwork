<?php
/**
 * Learn Page Controller
 */

namespace App\Http\Controllers;

use App\Support\Facades\PasswordGrant;

/**
 * Learn Page Controller
 * @package App\Http\Controllers
 */
class LearnController extends Controller
{
    /**
     * Display home page.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View Learn page
     */
    public function index()
    {
        return view( 'learn.index' );
    }
     /**
     * Display article page.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View Article page
     */
    public function article()
    {
        return view( 'learn.article' );
    }
}
