<?php
/**
 * Banner Seeder
 */

use Illuminate\Database\Seeder;

/**
 * This class is a seeder for banner model.
 */
class BannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //factory( \App\Models\Banner::class, 10 )->create();
        $banner = [
            [
                'title_thai'         => '9th Social Business Day',
                'title_english'      => '9th Social Business Day',
                'image_path_thai'    => 'uploads/banner/TGN-banner-1.jpg',
                'image_path_english' => 'uploads/banner/TGN-banner-1.jpg',
                'order'              => '1',
                'link'               => '',
                'start_date'         => '2019-06-20',
                'end_date'           => '2030-06-20',
                'status'             => 'public',
            ],
        ];
        foreach( $banner as $item ){
            DB::table( 'banner' )->insert( $item );
        }
    }
}
