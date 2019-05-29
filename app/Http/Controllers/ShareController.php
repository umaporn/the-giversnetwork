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
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View Share detail page
     */
    public function detail( Share $share )
    {
        //return view( 'share.detail' );
    }
}