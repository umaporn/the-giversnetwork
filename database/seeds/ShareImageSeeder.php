<?php
/**
 * Share Image Seeder
 */

use Illuminate\Database\Seeder;

/**
 * This class is a seeder for share image model.
 */
class ShareImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        factory( \App\Models\ShareImage::class )->times( 150 )->create();
    }
}
