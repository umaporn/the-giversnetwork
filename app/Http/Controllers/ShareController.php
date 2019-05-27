<?php
/**
 * Share Controller
 */

namespace App\Http\Controllers;

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
}
