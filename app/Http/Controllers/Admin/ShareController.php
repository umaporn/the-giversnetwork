<?php
/**
 * Admin Share Page Controller
 */

namespace App\Http\Controllers\Admin;

use App\Models\Share;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

/**
 * Admin Share Page Controller
 * @package App\Http\Controllers
 */
class ShareController extends Controller
{
    /** @var Share Share model */
    protected $shareModel;

    /**
     * ShareController constructor.
     *
     */
    public function __construct( Share $share )
    {
        $this->shareModel = $share;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index( Request $request )
    {
        $share = $this->shareModel->getShareAllListForAdmin( $request );

        return view( 'admin.share.index', compact( 'share' ) );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view( 'admin.share.create' );
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function challenge()
    {
        return view( 'admin.challenge.index' );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function challengeCreate()
    {
        return view( 'admin.challenge.create' );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store( Request $request )
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show( $id )
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit( $id )
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int                      $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update( Request $request, $id )
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id )
    {
        //
    }
}
