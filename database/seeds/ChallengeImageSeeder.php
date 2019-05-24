<?php
/**
 * Challenge Image Seeder
 */

use Illuminate\Database\Seeder;

/**
 * This class is a seeder for challenge image model.
 */
class ChallengeImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        factory( \App\Models\ChallengeImage::class )->times( 30 )->create();
    }
}
