<?php
/**
 * News Model
 */
namespace App\Models;

use App\Libraries\Search;
use App\Libraries\Utility;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Storage;

class News extends Model
{
    /** @var array A list of fields which are able to update in this model */
    protected $fillable = [
        'title_english', 'title_thai', 'content_english', 'content_thai',
        'type', 'status', 'public_date',
    ];

    /** @var string Table name */
    protected $table = 'news';

    /**
     * Get NewsImage model relationship.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany NewsImage model relationship
     */
    public function newsImage()
    {
        return $this->HasMany( 'App\Models\NewsImage', 'fk_news_id' );
    }

    /**
     * Get a list of news/article for displaying.
     *
     * @param Request $request News request object
     *
     * @return Collection A list of news articles for home page
     */
    public function getHomeNewsList()
    {
        $query = $this->with( [ 'newsImage' ] )
                      ->orderBy( 'public_date', 'desc' )
                      ->where( 'status', 'public' )->limit(3)->get();

        $data = $this->transformHomeNewsContent( $query );

        return $data;
    }


    /**
     * Transform news information.
     *
     * @param Collection $homeNewsList A list of news
     *
     * @return Collection Home news list for display
     */
    private function transformHomeNewsContent( Collection $homeNewsList )
    {
        foreach( $homeNewsList as $list ){
            $list->setAttribute( 'title', Utility::getLanguageFields( 'title', $list ) );
            $list->setAttribute( 'images', $this->getImages( $list ) );
            $this->setPublicDateForFrontEnd( $list );
        }

        return $homeNewsList;
    }

    /**
     * Set public date attribute.
     *
     * @param News $news News model
     *
     * @return void
     */
    private function setPublicDateForFrontEnd( News $news )
    {
        $news->setAttribute( 'public_date',
                             date( 'd', strtotime( $news->public_date ) ) . ' ' .
                             date( 'F', strtotime( $news->public_date ) ) . ' ' .
                             date( 'Y', strtotime( $news->public_date ) )
        );
    }


    /**
     * Get a new image list into an image store.
     *
     * @param News   $news      News model
     * @param string $imageSize Image size
     *
     * @return array Image store
     */
    public function getImages( News $news, string $imageSize = 'original' )
    {
        $imageStore = [];

        foreach( $news->newsImage as $image ){

            $attributes = $image->getAttributes();
            if( preg_match( '/^(http|https):\\/\\/[a-z0-9_]+([\\-\\.]{1}[a-z_0-9]+)*\\.[_a-z]{2,5}' . '((:[0-9]{1,5})?\\/.*)?$/i', $attributes[ $imageSize ] ) ){
                $imageStore = $attributes[ $imageSize ];
            } else {
                $imageStore = Storage::url( $attributes[ $imageSize ] );
            }

        }

        return $imageStore;
    }

}
