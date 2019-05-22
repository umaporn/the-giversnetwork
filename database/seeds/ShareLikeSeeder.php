<?php
/**
 * Share Like Seeder
 */

use Illuminate\Database\Seeder;

/**
 * This class is a seeder for share model.
 */
class ShareLikeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        factory( \App\Models\ShareLike::class )->times( 30 )->create();
    }
}
