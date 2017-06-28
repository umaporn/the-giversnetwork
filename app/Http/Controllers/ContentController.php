<?php
/**
 * Content page controller
 */

namespace App\Http\Controllers;

/**
 * Content Page Controller
 * @package App\Http\Controllers
 */
class ContentController extends Controller
{
    /**
     * Show the content list page
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View Content page
     */
    public function index()
    {
        $this->authorize( 'view', $this );

        return view( 'content.index' );
    }

    public function list()
    {
        $this->authorize( 'view', $this );

        return view( 'content.list' );
    }
}
