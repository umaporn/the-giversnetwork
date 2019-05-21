<?php
/**
 * Learn Controller
 */
namespace App\Http\Controllers;

class LearnController extends Controller
{
    /**
     * Display learn page.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View Learn page
     */
    public function index()
    {
        return view( 'learn.index' );
    }
}
