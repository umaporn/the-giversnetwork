<?php
/**
 * Give Controller
 */

namespace App\Http\Controllers;

use App\Models\Give;
use App\Models\GiveCategory;
use Illuminate\Http\Request;

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
    public function index( Request $request )
    {
        $data['giveCategory'] = $this->giveCategoryModel->getGiveCategoryList();
        $data['give'] = $this->giveModel->getGiveAllList( $request );

        return view( 'give.index', compact('data') );
    }

    /**
     * Get give list by category.
     *
     * @param string  $id Category id
     * @param Request $request Request object
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View Give item view
     */
    public function getGiveByCategory( string $id, Request $request )
    {
        $data['give'] = $this->giveModel->getHomeGiveList( $id, $request );

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

    /**
     * Display article page.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View Article page
     */
    public function article()
    {
        return view( 'give.article' );
    }

    /**
     * Display createItem page.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View createItem page
     */
    public function createItem()
    {
        return view( 'give.create_item' );
    }
}
