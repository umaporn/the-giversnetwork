<?php
/**
 * Home Page Controller
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Banner;
use App\Models\News;

/**
 * Home Page Controller
 * @package App\Http\Controllers
 */
class HomeController extends Controller
{
    /** @var Banner banner model instance */
    private $bannerModel;

    /** @var News news model instance */
    private $newsModel;

    /**
     * Initialize HomeController class.
     *
     * @param Banner $banner Banner model
     * @param News   $news   News model
     */
    public function __construct( Banner $banner, News $news )
    {
        $this->bannerModel = $banner;
        $this->newsModel   = $news;
    }

    /**
     * Display home page.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View Home page
     */
    public function index(Request $request)
    {
        $user   = Auth::user();
        $banner = $this->bannerModel->getHomeBannerList();
        $news   = $this->newsModel->getHomeNewsList();

        return view( 'home.index', compact( 'user', 'banner', 'news' ) );
    }
}
