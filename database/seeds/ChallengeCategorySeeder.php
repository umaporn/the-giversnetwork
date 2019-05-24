<?php
/**
 * Challenge Category Seeder
 */

use Illuminate\Database\Seeder;

/**
 * This class is a seeder for challenge category model.
 */
class ChallengeCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        factory( \App\Models\ChallengeCategory::class )->times( 10 )->create();
    }
}
