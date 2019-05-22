<?php
/**
 * Share Image Seeder
 */

use Illuminate\Database\Seeder;

/**
 * This class is a seeder for share model.
 */
class ShareImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        factory( \App\Models\ShareImage::class )->times( 30 )->create();
    }
}
