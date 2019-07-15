<?php
/**
 * Admin Give Page Controller
 */

namespace App\Http\Controllers\Admin;

use App\Models\Give;
use App\Models\GiveCategory;
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

    /** @var GiveCategory Give Category model */
    protected $giveCategoryModel;

    /**
     * GiveController constructor.
     */
    public function __construct( Give $give, GiveImage $giveImage, GiveCategory $giveCategory )
    {
        $this->giveModel         = $give;
        $this->giveImageModel    = $giveImage;
        $this->giveCategoryModel = $giveCategory;
    }

    /**
     * Display a listing of give.
     *
     * @param Request $request Request object
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View Give page
     */
    public function index( Request $request )
    {
        $give = $this->giveModel->getGiveAllListForAdmin( $request );

        return view( 'admin.give.index', compact( 'give' ) );
    }

    /**
     * Show the form for creating a new give.
     *
     * @return \Illuminate\Http\Response Give creation page
     */
    public function create()
    {
        $data['giveCategory'] = $this->giveCategoryModel->getGiveCategoryList();

        return view( 'admin.give.create', compact( 'data' ) );
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
    public function edit( Give $give )
    {
        $data['giveCategory'] = $this->giveCategoryModel->getGiveCategoryList();

        return view( 'admin.give.edit', compact( 'give', 'data' ) );
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
