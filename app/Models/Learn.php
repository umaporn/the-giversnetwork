<?php
/**
 * Learn Model
 */

namespace App\Models;

use App\Http\Requests\LearnRequest;
use App\Libraries\Image;
use App\Libraries\Search;
use App\Libraries\Utility;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Learn extends Model
{
    /** @var array A list of fields which are able to update in this model */
    protected $fillable = [];

    /** @var string Table name */
    protected $table = 'learn';

    /**
     * Get learn category model relationship.
     *
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo Learn category model relationship
     */
    public function learnCategory()
    {
        return $this->belongsTo( 'App\Models\LearnCategory', 'fk_category_id' );
    }

    /**
     * Get a list of learn for displaying.
     *
     * @param Request $request Request object
     * @param int     $limit   Limit of content
     *
     * @return LengthAwarePaginator A list of learn for home page
     */
    public function getHomeLearnList( Request $request, $limit = 4 )
    {
        $builder = $this->with( [ 'learnCategory' ] )->where( 'status', 'public' );

        $data = Search::search( $builder, 'learn', $request, [], $limit );

        return $this->transformLearnContent( $data );
    }

    /**
     * Transform learn information.
     *
     * @param LengthAwarePaginator $homeLearnList A list of learn
     *
     * @return LengthAwarePaginator Home learn list for display
     */
    private function transformLearnContent( LengthAwarePaginator $homeLearnList )
    {
        foreach( $homeLearnList as $list ){
            $list->setAttribute( 'title', Utility::getLanguageFields( 'title', $list ) );
            $list->setAttribute( 'description', Utility::getLanguageFields( 'description', $list ) );
            $list->setAttribute( 'content', Utility::getLanguageFields( 'content', $list ) );
            $list->setAttribute( 'category_title', Utility::getLanguageFields( 'title', $list->learnCategory ) );
            $list->setAttribute( 'image_path', Utility::getImages( $list['file_path'] ) );
            $this->setPublicDateForFrontEnd( $list );
        }

        return $homeLearnList;
    }

    /**
     * Set public date attribute.
     *
     * @param Learn $learn Learn model
     *
     * @return void
     */
    private function setPublicDateForFrontEnd( Learn $learn )
    {
        $learn->setAttribute( 'public_date',
                              date( 'd', strtotime( $learn->public_date ) ) . ' ' .
                              date( 'F', strtotime( $learn->public_date ) ) . ' ' .
                              date( 'Y', strtotime( $learn->public_date ) )
        );
    }

    /**
     * Get a list of most popular learn.
     *
     * @param Request $request Request object
     *
     * @return LengthAwarePaginator Learn list for display
     */
    public function getLearnMostPopular( Request $request )
    {
        $builder = $this->with( [ 'learnCategory' ] )
                        ->orderBy( 'view', 'desc' )
                        ->where( [ 'status' => 'public', 'highlight_status' => 'pinned' ] );

        $data = Search::search( $builder, 'learn', $request, [], '3' );

        return $this->transformLearnContent( $data );
    }

    /**
     * Get learn all list.
     *
     * @param Request $request Request Object
     *
     * @return LengthAwarePaginator list of learn
     */
    public function getLearnAllList( Request $request )
    {
        $builder = $this->with( [ 'learnCategory' ] )
                        ->orderBy( 'id', 'desc' )
                        ->where( 'status', 'public' );

        $data = Search::search( $builder, 'learn', $request );

        return $this->transformLearnContent( $data );

    }

    /**
     * Get learn detail information.
     *
     * @param Learn $learn Learn model
     *
     * @return Learn learn detail
     */
    public function getLearnDetail( Learn $learn )
    {
        $learn = $this->where( [ 'id' => $learn->id ] )->first();

        if( $learn ){
            $learn->setAttribute( 'title', Utility::getLanguageFields( 'title', $learn ) );
            $learn->setAttribute( 'content', Utility::getLanguageFields( 'content', $learn ) );
            $learn->setAttribute( 'image_path', Utility::getImages( $learn['file_path'] ) );
            $this->setPublicDateForFrontEnd( $learn );
        }

        return $learn;
    }

    public function updateLearnInformation( LearnRequest $request, Learn $learn )
    {
        $data = [
            'title_english'       => $request->input( 'title_english' ),
            'title_thai'          => $request->input( 'title_thai' ),
            'description_english' => $request->input( 'description_english' ),
            'description_thai'    => $request->input( 'description_thai' ),
            'content_english'     => $request->input( 'content_english' ),
            'content_thai'        => $request->input( 'content_thai' ),
            'status'              => $request->input( 'status' ) ? 'public' : 'draft',
            'highlight_status'    => $request->input( 'highlight_status' ) ? 'pinned' : 'unpinned',
        ];

        if( $request->file( 'image_path' ) ){
            $imageInformation = $this->saveImage( $request );

            if( isset( $imageInformation['imageInformation']['original'] ) ){
                $image_file = $imageInformation['imageInformation']['original'];

                $data['file_path'] = $image_file;
            }
        }

        $result = $this->where( 'id', $learn->id )->update( $data );

        if( $result ){
            $response = [ 'success' => true, 'message' => __( 'learn_admin.saved_learn_success' ), ];
        } else {
            $response = [ 'success' => false, 'message' => __( 'learn_admin.saved_learn_error' ), ];
        }

        return $response;

    }

    /**
     * Handle image upload from file browser.
     *
     * @param LearnRequest $request LearnRequest object
     *
     * @return array Image saved result
     */
    private function saveImage( LearnRequest $request )
    {
        $imageInformation = [];
        $file             = $request->file( 'image_path' );
        $success          = true;

        if( $file ){

            $imageInformation = Image::upload( $file, 'learns' );
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
     * @return void
     */
    private function deleteImage()
    {
        $imagesFields = [ 'image_path' ];
        $attributes   = $this->getAttributes();

        $this->setAttribute( 'image_path', Storage::url( $attributes['image_path'] ) );

        Image::deleteImage( [ $this->getAttributes() ], $imagesFields );

    }

}
