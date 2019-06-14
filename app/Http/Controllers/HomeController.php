<?php
/**
 * Home Page Controller
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Banner;
use App\Models\News;
use App\Models\Share;
use App\Models\Learn;
use App\Models\Events;
use App\Models\Challenge;
use App\Models\Give;
use App\Models\GiveCategory;

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

    /** @var Challenge challenge model instance */
    private $challengeModel;

    /** @var Give give model instance */
    private $giveModel;

    /** @var GiveCategory give category model instance */
    private $giveCategoryModel;

    /**
     * Initialize HomeController class.
     *
     * @param Banner       $banner       Banner model
     * @param News         $news         News model
     * @param Share        $share        Share model
     * @param Learn        $learn        Learn model
     * @param Challenge    $challenge    Challenge model
     * @param Give         $give         Give model
     * @param GiveCategory $giveCategory GiveCategory model
     */
    public function __construct( Banner $banner, News $news, Share $share, Learn $learn, Events $events, Challenge $challenge, Give $give, GiveCategory $giveCategory )
    {
        $this->bannerModel       = $banner;
        $this->newsModel         = $news;
        $this->shareModel        = $share;
        $this->learnModel        = $learn;
        $this->eventsModel       = $events;
        $this->challengeModel    = $challenge;
        $this->giveModel         = $give;
        $this->giveCategoryModel = $giveCategory;
    }

    /**
     * Display home page.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View Home page
     */
    public function index( Request $request )
    {
        $data                 = [];
        $data['user']         = Auth::user();
        $data['banner']       = $this->bannerModel->getHomeBannerList( $request );
        $data['news']         = $this->newsModel->getHomeNewsList( $request );
        $data['share']        = $this->shareModel->getHomeShareList( $request );
        $data['challenge']    = $this->challengeModel->getChallengeList( $request );
        $data['learn']        = $this->learnModel->getHomeLearnList( $request );
        $data['events']       = $this->eventsModel->getHomeEventsList( $request );
        $data['giveCategory'] = $this->giveCategoryModel->getGiveCategoryList();
        $data['give']         = $this->giveModel->getHomeGiveList( '1', $request );

        return view( 'home.index', compact( 'data' ) );
    }
}
