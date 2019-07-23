<?php
/**
 * News Model
 */

namespace App\Models;

use App\Libraries\Image;
use App\Libraries\Search;
use App\Libraries\Utility;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\NewsRequest;

class News extends Model
{
    /** @var array A list of fields which are able to update in this model */
    protected $fillable = [
        'title_english', 'title_thai', 'description_english', 'description_thai', 'content_english', 'content_thai',
        'type', 'status', 'public_date', 'view',
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
     * @return LengthAwarePaginator A list of news articles for home page
     */
    public function getHomeNewsList( Request $request )
    {
        $builder = $this->with( [ 'newsImage' ] )
                        ->orderBy( 'public_date', 'desc' )
                        ->where( 'status', 'public' );

        $data = Search::search( $builder, 'news', $request, [], '3' );

        return $this->transformHomeNewsContent( $data );

    }

    /**
     * Get a list of news/article for displaying on news page.
     *
     * @param Request $request News request object
     *
     * @return LengthAwarePaginator A list of news articles for home page
     */
    public function getNewsForSidebar( Request $request )
    {
        $builder = $this->with( [ 'newsImage' ] )
                        ->orderBy( 'public_date', 'desc' )
                        ->where( 'status', 'public' );

        $data = Search::search( $builder, 'news', $request, [], '2' );

        return $this->transformHomeNewsContent( $data );

    }

    /**
     * Transform news information.
     *
     * @param LengthAwarePaginator $homeNewsList A list of news
     *
     * @return LengthAwarePaginator Home news list for display
     */
    private function transformHomeNewsContent( LengthAwarePaginator $homeNewsList )
    {
        foreach( $homeNewsList as $list ){
            $list->setAttribute( 'title', Utility::getLanguageFields( 'title', $list ) );
            $list->setAttribute( 'description', Utility::getLanguageFields( 'description', $list ) );
            $list->setAttribute( 'image_path', $this->getImages( $list ) );
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

    /**
     * Get news all list.
     *
     * @param Request $request Request Object
     *
     * @return LengthAwarePaginator list of news
     */
    public function getNewsAllList( Request $request )
    {
        $builder = $this->with( [ 'newsImage' ] )
                        ->orderBy( 'public_date', 'desc' )
                        ->where( 'status', 'public' );

        $data = Search::search( $builder, 'news', $request );

        return $this->transformHomeNewsContent( $data );

    }

    /**
     * Get news detail information.
     *
     * @param News $news News model
     *
     * @return News news detail
     */
    public function getNewsDetail( News $news )
    {
        $news = $this->with( [ 'newsImage' ] )->where( [ 'id' => $news->id ] )->first();

        if( $news ){
            $news->setAttribute( 'title', Utility::getLanguageFields( 'title', $news ) );
            $news->setAttribute( 'content', Utility::getLanguageFields( 'content', $news ) );
            $this->setPublicDateForFrontEnd( $news );
            foreach( $news->newsImage as $news_image ){
                $news_image->setAttribute( 'image_path', $this->getNewsImages( $news_image ) );
                $news_image->setAttribute( 'alt', Utility::getLanguageFields( 'alt', $news_image ) );
            }
        }

        return $news;
    }

    /**
     * Get a news image list into an image store.
     *
     * @param NewsImage $newsImage News model
     *
     * @return array Image store
     */
    public function getNewsImages( NewsImage $newsImage )
    {

        $attributes = $newsImage->getAttributes();

        if( preg_match( '/^(http|https):\\/\\/[a-z0-9_]+([\\-\\.]{1}[a-z_0-9]+)*\\.[_a-z]{2,5}' . '((:[0-9]{1,5})?\\/.*)?$/i', $attributes['original'] ) ){
            $imageStore = $attributes['original'];
        } else {
            $imageStore = Storage::url( $attributes['original'] );
        }

        return $imageStore;
    }

    /**
     * Get news all list for admin.
     *
     * @param Request $request Request Object
     *
     * @return LengthAwarePaginator list of news
     */
    public function getNewsAllListForAdmin( Request $request )
    {
        $builder = $this->orderBy( 'id', 'desc' );

        $data = Search::search( $builder, 'news', $request );

        return $this->transformHomeNewsContent( $data );

    }

    /**
     * Updating news information.
     *
     * @param NewsRequest $request News request object
     * @param News        $news    News model
     *
     * @return array Response information
     */
    public function updateNewsInformation( NewsRequest $request, News $news )
    {

        $data = [
            'title_thai'          => $request->input( 'title_thai' ),
            'title_english'       => $request->input( 'title_english' ),
            'description_thai'    => $request->input( 'description_thai' ),
            'description_english' => $request->input( 'description_english' ),
            'content_thai'        => $request->input( 'content_thai' ),
            'content_english'     => $request->input( 'content_english' ),
            'view'                => '0',
            'type'                => $request->input( 'type' ),
            'status'              => $request->input( 'status' ) ? 'public' : 'draft',
        ];

        $successForNews = $this->where( 'id', $news->id )->update( $data );

        if( $successForNews ){

            $successForNewsImage = '';

            if( $request->file( 'image_path' ) ){

                DB::table( 'news_image' )->where( 'fk_news_id', $news->id )->delete();

                foreach( $request->file( 'image_path' ) as $imagePath ){

                    $imageInformation = $this->saveImage( $imagePath );

                    if( isset( $imageInformation['imageInformation']['original'] ) ){

                        $imagePathOriginal  = $imageInformation['imageInformation']['original'];
                        $imagePathThumbnail = $imageInformation['imageInformation']['thumbnail'];
                    }

                    $newsID = $news->id;

                    $newsImageInformation = [
                        'original'    => $imagePathOriginal,
                        'thumbnail'   => $imagePathThumbnail,
                        'fk_news_id'  => $newsID,
                        'alt_thai'    => $request->input( 'title_thai' ),
                        'alt_english' => $request->input( 'title_english' ),
                    ];

                    $successForNewsImage = $this->newsImage()->updateOrCreate( [ 'fk_news_id' => $newsID ],
                                                                               $newsImageInformation );
                }
            }
        }

        if( $successForNews || $successForNewsImage ){
            $response = [ 'success' => true, 'message' => __( 'news_admin.saved_news_success' ), ];
        } else {
            $response = [ 'success' => false, 'message' => __( 'news_admin.saved_news_error' ), ];
        }

        return $response;
    }

    /**
     * Handle image upload from file browser.
     *
     * @param UploadedFile $imagePath UploadedFile object
     *
     * @return array Image saved result
     */
    private function saveImage( UploadedFile $imagePath )
    {
        $imageInformation = [];
        $file             = $imagePath;
        $success          = true;

        if( $file ){

            $imageInformation = Image::upload( $file, 'news' );
            $success          = ( count( $imageInformation ) ) ? true : false;

            if( $this->id ){
                $this->deleteImage();
            }

        }

        return [ 'success' => $success, 'imageInformation' => $imageInformation ];
    }

    /**
     * Delete an uploaded image.
     *
     * @param array $images Image's information
     *
     * @return    void
     */
    private function deleteImage( array $images )
    {
        $imagesFields = [ 'original', 'thumbnail' ];
        Image::deleteImage( $images, $imagesFields );
    }

    /**
     * Creating news for admin page.
     *
     * @param NewsRequest $request Request object
     *
     * @return array Creation response
     */
    public function createNews( NewsRequest $request )
    {
        $newNews = [
            'title_thai'          => $request->input( 'title_thai' ),
            'title_english'       => $request->input( 'title_english' ),
            'description_thai'    => $request->input( 'description_thai' ),
            'description_english' => $request->input( 'description_english' ),
            'content_thai'        => $request->input( 'content_thai' ),
            'content_english'     => $request->input( 'content_english' ),
            'view'                => '0',
            'type'                => $request->input( 'type' ),
            'public_date'         => date( 'Y-m-d' ),
            'status'              => $request->input( 'status' ) ? 'public' : 'draft',
        ];

        $successForNews = $this->create( $newNews );

        if( $successForNews ){

            $successForNewsImage = '';

            if( $request->file( 'image_path' ) ){

                foreach( $request->file( 'image_path' ) as $imagePath ){

                    $imageInformation = $this->saveImage( $imagePath );

                    if( isset( $imageInformation['imageInformation']['original'] ) ){

                        $imagePathOriginal  = $imageInformation['imageInformation']['original'];
                        $imagePathThumbnail = $imageInformation['imageInformation']['thumbnail'];
                    }

                    $newsID = $successForNews->id;

                    $newsImageInformation = [
                        'original'    => $imagePathOriginal,
                        'thumbnail'   => $imagePathThumbnail,
                        'fk_news_id'  => $newsID,
                        'alt_thai'    => $request->input( 'title_thai' ),
                        'alt_english' => $request->input( 'title_english' ),
                    ];

                    $successForNewsImage = $this->newsImage()->updateOrCreate( [ 'fk_news_id' => $newsID ],
                                                                               $newsImageInformation );
                }
            }
        }

        return [ 'successForNews' => $successForNews, 'successForNewsImage' => $successForNewsImage ];
    }

    /**
     * Delete news content.
     *
     * @return    bool|mixed|null    Deleted status
     */
    public function deleteNews()
    {
        $success = false;
        $images  = $this->getImages( $this );

        if( $images ){

            $this->deleteImage( $images );
            $success = $this->newsImage()->delete();

        }

        $success = $this->delete();

        return $success;
    }
}
