<?php
/**
 * News Seeder
 */

use App\Models\NewsImage;
use Illuminate\Database\Seeder;

/**
 * This class is a seeder for News model.
 */
class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        factory( \App\Models\News::class )->times( 30 )
                                          ->create()
                                          ->each( function( $news ){
                                              $news->newsImage()->save( factory( NewsImage::class )->make() );
                                          } );
    }
}
