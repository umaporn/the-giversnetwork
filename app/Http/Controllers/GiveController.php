<?php
/**
 * Give Controller
 */

namespace App\Http\Controllers;

use App\Models\Give;
use App\Models\GiveCategory;
use App\Models\GiveInterestIn;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\InterestIn;

class GiveController extends Controller
{
    /** @var Give give model instance */
    private $giveModel;

    /** @var GiveCategory give category model instance */
    private $giveCategoryModel;

    /** @var GiveInterestIn GiveInterestIn model */
    private $giveInterestInModel;

    /** @var InterestIn InterestIn model */
    private $interestInModel;

    /**
     * Initialize HomeController class.
     *
     * @param Give         $give         Give model
     * @param GiveCategory $giveCategory GiveCategory model
     */
    public function __construct( Give $give, GiveCategory $giveCategory, GiveInterestIn $giveInterestIn, InterestIn $interestIn )
    {
        $this->giveModel           = $give;
        $this->giveCategoryModel   = $giveCategory;
        $this->giveInterestInModel = $giveInterestIn;
        $this->interestInModel     = $interestIn;
    }

    /**
     * Get a validator for an incoming give item request.
     *
     * @param array $data
     *
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator( array $data )
    {
        return Validator::make( $data, [
            'type'             => config( 'validation.give.type' ),
            'fk_category_id'   => config( 'validation.give.fk_category_id' ),
            'name'             => config( 'validation.give.name' ),
            'address'          => config( 'validation.give.address' ),
            'description_text' => config( 'validation.give.description_text' ),
        ] );
    }

    /**
     * Display give page.
     *
     * @param Request $request Request object
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View Give page
     */
    public function index( Request $request )
    {
        $data['giveCategory'] = $this->giveCategoryModel->getGiveCategoryList();
        $data['allList']      = $this->giveModel->getGiveAllList( $request );
        $type                 = $request->get( 'type' ) ? $request->get( 'type' ) : 'give';
        $category_id          = $request->get( 'category_id' );

        if( $request->ajax() ){
            return response()->json( [
                                         'data' => view( 'give.list', compact( 'data', 'type', 'category_id' ) )->render(),
                                         'type' => $type,
                                     ] );
        }

        return view( 'give.index', compact( 'data', 'type', 'category_id' ) );
    }

    /**
     * Get give list by category.
     *
     * @param Request $request Request object
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View Give item view
     */
    public function getGiveByCategory( Request $request )
    {
        $data['give'] = $this->giveModel->getHomeGiveList( $request );

        return view( 'home.give_item', compact( 'data' ) );
    }

    /**
     * Get give list.
     *
     * @param Request $request Request Object
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getGiveList( Request $request )
    {
        $data['allList'] = $this->giveModel->getGiveAllList( $request );
        $type            = $request->get( 'type' ) ? $request->get( 'type' ) : 'give';
        $category_id     = $request->get( 'category_id' );

        if( $request->ajax() ){
            return response()->json( [
                                         'data' => view( 'give.list', compact( 'data', 'type', 'category_id' ) )->render(),
                                     ] );
        }

        return view( 'give.list', compact( 'data', 'type', 'category_id' ) );
    }

    /**
     * Display give detail page.
     *
     * @param Give    $give    Give Model
     * @param Request $request Request object
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\JsonResponse|\Illuminate\View\View Give detail page
     */
    public function detail( Give $give, Request $request )
    {
        $data                   = $this->giveModel->getGiveDetail( $give );
        $data['giveCategory']   = $this->giveCategoryModel->getGiveCategoryList();
        $data['otherUserItems'] = $this->giveModel->getGiveUserItemList( $data['fk_user_id'], $request );
        $data['allList']        = $this->giveModel->getGiveAllList( $request );
        $category_id            = $request->get( 'category_id' );
        $giveInterestInList     = $this->giveInterestInModel->getGiveInterestInList( $give->id );

        if( $request->ajax() ){
            return response()->json( [
                                         'data' => view( 'give.other_user_list', compact( 'data', 'category_id' ) )->render(),
                                     ] );
        }

        return view( 'give.detail', compact( 'data', 'category_id', 'giveInterestInList' ) );
    }

    /**
     * Display createItem page.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View createItem page
     */
    public function showCreateItemForm()
    {
        $data['giveCategory'] = $this->giveCategoryModel->getGiveCategoryList();
        $interestList         = $this->interestInModel->getInterestInList();

        return view( 'give.create_item', compact( 'data', 'interestList' ) );
    }

    /**
     * Create give item.
     *
     * @param Request $request Request object
     *
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse
     */
    public function createGiveItem( Request $request )
    {
        $this->validator( $request->input() )->validate();

        $result = $this->giveModel->createGive( $request );

        return $this->setUpdateOrCreationResponse( $request, $result );
    }

    /**
     * Set update or creation response.
     *
     * @param Request $request Request object
     * @param array   $result  Updating or creating result
     *
     * @return    \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse
     */
    private function setUpdateOrCreationResponse( Request $request, array $result )
    {
        $response = $this->setResponseMessages( $result );

        if( $request->ajax() ){
            return response()->json( $response );
        } else {
            return redirect()->route( 'give.showCreateItemForm' );
        }
    }

    /**
     * Set error messages from result.
     *
     * @param array $result Result of saved give item
     *
     * @return array Error messages
     */
    private function setResponseMessages( array $result )
    {

        if( !$result['successForGive'] && !$result['successForGiveImage'] ){
            $data = [
                'success' => false,
                'error'   => __( 'give.create_item_form.saved_give_error' ),
            ];
        } else {
            $data = [
                'success'       => true,
                'message'       => __( 'give.create_item_form.saved_give_success' ),
                'redirectedUrl' => route( 'give.index' ),
            ];
        }

        return $data;
    }
}
