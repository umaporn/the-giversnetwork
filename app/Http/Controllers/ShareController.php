<?php
/**
 * Share Controller
 */

namespace App\Http\Controllers;

use App\Models\Share;

class ShareController extends Controller
{
    /**
     * Display share page.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View Share page
     */
    public function index()
    {
        return view( 'share.index' );
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

    /**
     * Display article page.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View Article page
     */
    public function article()
    {
        return view( 'share.article' );
    }

    public function createThread()
    {
        return view( 'share.create_thread' );
    }
}
