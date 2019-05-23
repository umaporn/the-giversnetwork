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
use App\Models\Learn;
use App\Models\Events;

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

    /** @var Learn learn model instance */
    private $learnModel;

    /** @var Events events model instance */
    private $eventsModel;

    /**
     * Initialize HomeController class.
     *
     * @param Banner $banner Banner model
     * @param News   $news   News model
     * @param Share  $share  Share model
     * @param Learn  $learn  Learn model
     */
    public function __construct( Banner $banner, News $news, Share $share, Learn $learn, Events $events )
    {
        $this->bannerModel = $banner;
        $this->newsModel   = $news;
        $this->shareModel  = $share;
        $this->learnModel  = $learn;
        $this->eventsModel = $events;
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
        $learn  = $this->learnModel->getHomeLearnList();
        $events = $this->eventsModel->getHomeEventsList();

        return view( 'home.index', compact( 'user', 'banner', 'news', 'share', 'learn', 'events' ) );
    }
}
