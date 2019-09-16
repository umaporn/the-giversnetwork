<?php
/**
 * Give Image Seeder
 */

use Illuminate\Database\Seeder;

/**
 * This class is a seeder for give image model.
 */
class GiveImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        factory( \App\Models\GiveImage::class )->times( 100 )->create();
    }
}
