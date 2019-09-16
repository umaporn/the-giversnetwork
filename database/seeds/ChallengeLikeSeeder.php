<?php
/**
 * Challenge Like Seeder
 */

use Illuminate\Database\Seeder;

/**
 * This class is a seeder for challenge like model.
 */
class ChallengeLikeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        factory( \App\Models\ChallengeLike::class )->times( 30 )->create();
    }
}
