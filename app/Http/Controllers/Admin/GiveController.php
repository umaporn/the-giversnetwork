<?php
/**
 * Admin Give Page Controller
 */

namespace App\Http\Controllers\Admin;

use App\Models\Give;
use App\Models\GiveImage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

/**
 * Admin Give Page Controller
 * @package App\Http\Controllers
 */
class GiveController extends Controller
{
    /** @var Give Give model */
    protected $giveModel;

    /** @var GiveImage Give Image model */
    protected $giveImageModel;

    /**
     * GiveController constructor.
     */
    public function __construct( Give $give, GiveImage $giveImage )
    {
        $this->giveModel      = $give;
        $this->giveImageModel = $giveImage;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index( Request $request )
    {
        $give = $this->giveModel->getGiveAllListForAdmin( $request );

        return view( 'admin.give.index', compact( 'give' ) );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
