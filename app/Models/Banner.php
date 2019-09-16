<?php
/**
 * Banner Model
 */

namespace App\Models;

use App\Libraries\Image;
use App\Libraries\Search;
use App\Libraries\Utility;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Http\Requests\BannerRequest;

class Banner extends Model
{
    /** @var array A list of fields which are able to update in this model */
    protected $fillable = [ 'title_english', 'title_thai', 'image_path_english', 'image_path_thai',
                            'link', 'start_date', 'end_date', 'status' ];

    /** @var string Table name */
    protected $table = 'banner';

    /**
     * Get banner list.
     *
     * @param Request $request Request object
     *
     * @return LengthAwarePaginator A list of banner
     */
    public function getHomeBannerList( Request $request )
    {
        $builder = $this->where( [ 'status' => 'public', ] )
                        ->where( 'start_date', '<=', date( 'Y-m-d' ) )
                        ->where( 'end_date', '>=', date( 'Y-m-d' ) )
                        ->orderBy( 'order', 'asc' );

        $data = Search::search( $builder, 'banner', $request );

        return $this->transformHomeBannerContent( $data );
    }

    /**
     * Transform privilege banner information.
     *
     * @param LengthAwarePaginator $homeBannerList A list of privilege
     *
     * @return LengthAwarePaginator Home banner list for display
     */
    private function transformHomeBannerContent( LengthAwarePaginator $homeBannerList )
    {
        foreach( $homeBannerList as $list ){
            $list->setAttribute( 'title', Utility::getLanguageFields( 'title', $list ) );
            $list->setAttribute( 'image_path', Utility::getImages( Utility::getLanguageFields( 'image_path', $list ) ) );
        }

        return $homeBannerList;
    }

    /**
     * Get banner all list for admin.
     *
     * @param Request $request Request Object
     *
     * @return LengthAwarePaginator list of banner
     */
    public function getBannerAllListForAdmin( Request $request )
    {
        $builder = $this->orderBy( 'id', 'desc' );

        $data = Search::search( $builder, 'banner', $request );

        return $this->transformBannerContent( $data );
    }

    /**
     * Transform banner information.
     *
     * @param LengthAwarePaginator $homeBannerList A list of banner
     *
     * @return LengthAwarePaginator Home banner list for display
     */
    private function transformBannerContent( LengthAwarePaginator $homeBannerList )
    {
        foreach( $homeBannerList as $list ){
            $list->setAttribute( 'title', Utility::getLanguageFields( 'title', $list ) );
            $list->setAttribute( 'description', Utility::getLanguageFields( 'description', $list ) );
            $list->setAttribute( 'content', Utility::getLanguageFields( 'content', $list ) );
            if( $list['image_path_english'] ){
                $list->setAttribute( 'image_path', Utility::getImages( $list['image_path_english'] ) );
            }
        }

        return $homeBannerList;
    }

    /**
     * Updating banner information.
     *
     * @param BannerRequest $request Banner request object
     * @param Banner        $banner  Banner model
     *
     * @return array Response information
     */
    public function updateBannerInformation( BannerRequest $request, Banner $banner )
    {
        $imageInformation_thai    = [];
        $imageInformation_english = [];

        $data = [
            'title_english' => $request->input( 'title_english' ),
            'title_thai'    => $request->input( 'title_thai' ),
            'link'          => $request->input( 'link' ),
            'start_date'    => $request->input( 'start_date' ),
            'end_date'      => $request->input( 'end_date' ),
            'status'        => $request->input( 'status' ) ? 'public' : 'draft',
        ];

        if( $request->file( 'image_path_english' ) ){
            $imageInformation_english = $this->saveImage( $request->file( 'image_path_english' )[0] );

            if( isset( $imageInformation_english['imageInformation']['original'] ) ){
                $image_file_english         = $imageInformation_english['imageInformation']['original'];
                $data['image_path_english'] = $image_file_english;
            }
        }

        if( $request->file( 'image_path_thai' ) ){
            $imageInformation_thai = $this->saveImage( $request->file( 'image_path_thai' )[0] );

            if( isset( $imageInformation_thai['imageInformation']['original'] ) ){
                $image_file_thai         = $imageInformation_thai['imageInformation']['original'];
                $data['image_path_thai'] = $image_file_thai;
            }
        }

        $result = $this->where( 'id', $banner->id )->update( $data );

        if( $result ){
            $response = [ 'success' => true, 'message' => __( 'banner_admin.saved_banner_success' ), ];
        } else {
            $response = [ 'success' => false, 'message' => __( 'banner_admin.saved_banner_error' ), ];
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

            $imageInformation = Image::upload( $file, 'banner' );
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

    /**
     * Create banner information.
     *
     * @param BannerRequest $request Banner request object
     *
     * @return array Response information
     */
    public function createBanner( BannerRequest $request )
    {
        $newBanner = [
            'title_english' => $request->input( 'title_english' ),
            'title_thai'    => $request->input( 'title_thai' ),
            'link'          => $request->input( 'link' ),
            'start_date'    => $request->input( 'start_date' ),
            'end_date'      => $request->input( 'end_date' ),
            'status'        => $request->input( 'status' ) ? 'public' : 'draft',
        ];

        if( $request->file( 'image_path_english' ) ){
            $imageInformation_english = $this->saveImage( $request->file( 'image_path_english' )[0] );

            if( isset( $imageInformation_english['imageInformation']['original'] ) ){
                $image_file_english              = $imageInformation_english['imageInformation']['original'];
                $newBanner['image_path_english'] = $image_file_english;
            }
        }

        if( $request->file( 'image_path_thai' ) ){
            $imageInformation_thai = $this->saveImage( $request->file( 'image_path_thai' )[0] );

            if( isset( $imageInformation_thai['imageInformation']['original'] ) ){
                $image_file_thai              = $imageInformation_thai['imageInformation']['original'];
                $newBanner['image_path_thai'] = $image_file_thai;
            }
        }

        $successForBanner = $this->create( $newBanner );

        return [ 'successForBanner' => $successForBanner ];

    }
}
