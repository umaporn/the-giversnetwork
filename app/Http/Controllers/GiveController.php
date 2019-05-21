<?php
/**
 * Give Controller
 */
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GiveController extends Controller
{
    /**
     * Display give page.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View Give page
     */
    public function index()
    {
        return view( 'give.index' );
    }
}
