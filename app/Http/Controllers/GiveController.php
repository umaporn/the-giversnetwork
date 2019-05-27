<?php
/**
 * Give Controller
 */

namespace App\Http\Controllers;

use App\Models\Give;
use App\Models\GiveCategory;

class GiveController extends Controller
{
    /** @var Give give model instance */
    private $giveModel;

    /** @var GiveCategory give category model instance */
    private $giveCategoryModel;

    /**
     * Initialize HomeController class.
     *
     * @param Give         $give         Give model
     * @param GiveCategory $giveCategory GiveCategory model
     */
    public function __construct( Give $give, GiveCategory $giveCategory )
    {
        $this->giveModel         = $give;
        $this->giveCategoryModel = $giveCategory;
    }

    /**
     * Display give page.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View Give page
     */
    public function index()
    {
        return view( 'give.index' );
    }

    /**
     * Get give list by category.
     *
     * @param string $id
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getGiveByCategory( string $id )
    {
        $data['give'] = $this->giveModel->getHomeGiveList( $id );

        return view( 'home.give_item', compact( 'data' ) );
    }

    /**
     * Display give detail page.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View Give detail page
     */
    public function detail( Give $give )
    {
        //return view( 'events.detail' );
    }
}
