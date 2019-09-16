<?php
/**
 * Challenge Seeder
 */

use Illuminate\Database\Seeder;

/**
 * This class is a seeder for challenge model.
 */
class ChallengeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        factory( \App\Models\Challenge::class )->times( 30 )->create();
    }
}
