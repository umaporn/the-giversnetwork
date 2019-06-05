<?php
/**
 * Share Page Controller
 */

namespace App\Http\Controllers;

use App\Support\Facades\PasswordGrant;

/**
 * share Page Controller
 * @package App\Http\Controllers
 */
class ShareController extends Controller
{
    /**
     * Display home page.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View share page
     */
    public function index()
    {
        return view( 'share.index' );
    }
     /**
     * Display challenge page.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View Challenge page
     */
    public function challenge()
    {
        return view( 'share.challenge' );
    }
     /**
     * Display article page.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View Article page
     */
    public function article()
    {
        return view( 'share.article' );
    }
}
