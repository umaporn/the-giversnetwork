<?php
/**
 * Admin Banner Page Controller
 */

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Http\Requests\BannerRequest;
use Illuminate\Http\Request;

/**
 * Admin Banner Page Controller
 * @package App\Http\Controllers
 */
class BannerController extends Controller
{
    /** @var Banner Banner model */
    protected $bannerModel;

    /**
     * BannerController constructor.
     *
     */
    public function __construct( Banner $banner )
    {
        $this->bannerModel = $banner;
    }

    /**
     * Display admin banner page.
     *
     * @param Request $request Request object
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View Banner page
     */
    public function index( Request $request )
    {
        $banners = $this->bannerModel->getBannerAllListForAdmin( $request );

        return view( 'admin.banner.index', compact( 'banners' ) );
    }

    /**
     * Display admin banner edition form.
     *
     * @param Banner $banner Banner model
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View Banner edition form
     */
    public function edit( Banner $banner )
    {
        return view( 'admin.banner.edit', compact( 'banner' ) );
    }

    /**
     * Display admin banner creation form.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View Banner creation form
     */
    public function create()
    {
        return view( 'admin.banner.create' );
    }

    /**
     * Creating banner information.
     *
     * @param BannerRequest $request Banner request object
     *
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse Response information
     */
    public function store( BannerRequest $request )
    {
        $result = $this->bannerModel->createBanner( $request );

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
            return redirect()->route( 'admin.banner.index' );
        }
    }

    /**
     * Set error messages from result.
     *
     * @param array $result Result of saved banner
     *
     * @return array Error messages
     */
    private function setResponseMessages( array $result )
    {

        if( !$result['successForBanner'] && !$result['successForBannerImage'] ){
            $data = [
                'success' => false,
                'error'   => __( 'banner_admin.saved_banner_error' ),
            ];
        } else {
            $data = [
                'success'       => true,
                'message'       => __( 'banner_admin.saved_banner_success' ),
                'redirectedUrl' => route( 'admin.banner.index' ),
            ];
        }

        return $data;
    }

    /**
     * Updating banner information.
     *
     * @param BannerRequest $request Banner request object
     * @param Banner        $banner  Banner model
     *
     * @return \Illuminate\Http\JsonResponse Updating response
     */
    public function update( BannerRequest $request, Banner $banner )
    {
        $response = $this->bannerModel->updateBannerInformation( $request, $banner );

        if( !$response['success'] ){
            return response()->json( $response, 422 );
        }

        return response()->json( [
                                     'success'       => $response['success'],
                                     'message'       => $response['message'],
                                     'redirectedUrl' => url()->previous(),
                                 ] );
    }

    /**
     * Delete a specific banner.
     *
     * @param Request $request Request object
     * @param Banner  $banner  Banner model
     *
     * @return    \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    public function destroy( Request $request, Banner $banner )
    {
        $success = $banner->delete();

        if( $request->ajax() ){
            return response()->json( [
                                         'success'       => $success,
                                         'message'       => __( 'banner_admin.banner_management.remove_banner_success' ),
                                         'redirectedUrl' => route( 'admin.banner.index' ),
                                     ] );
        }
    }

}
