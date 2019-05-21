<?php
/**
 * Home Page Controller
 */

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Banner;

/**
 * Home Page Controller
 * @package App\Http\Controllers
 */
class HomeController extends Controller
{
    /** @var Banner Home banner model instance */
    private $bannerModel;

    /**
     * Initialize HomeController class.
     *
     * @param Banner $banner Banner model
     */
    public function __construct( Banner $banner )
    {
        $this->bannerModel = $banner;
    }

    /**
     * Display home page.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View Home page
     */
    public function index()
    {
        $user   = Auth::user();
        $banner = $this->bannerModel->getHomeBannerList();

        return view( 'home.index', compact( 'user', 'banner' ) );
    }
}
