<?php
/**
 * Home Page Controller
 */

namespace App\Http\Controllers;

use App\Models\ShareLike;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Banner;
use App\Models\News;
use App\Models\Share;

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

    /** @var Share share model instance */
    private $shareModel;

    /**
     * Initialize HomeController class.
     *
     * @param Banner $banner Banner model
     * @param News   $news   News model
     * @param Share  $share  Share model
     */
    public function __construct( Banner $banner, News $news, Share $share )
    {
        $this->bannerModel = $banner;
        $this->newsModel   = $news;
        $this->shareModel  = $share;
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
        $news   = $this->newsModel->getHomeNewsList();
        $share  = $this->shareModel->getHomeShareList();

        return view( 'home.index', compact( 'user', 'banner', 'news' ) );
    }
}
