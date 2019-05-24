<?php
/**
 * Challenge Comment Seeder
 */

use Illuminate\Database\Seeder;

/**
 * This class is a seeder for challenge comment model.
 */
class ChallengeCommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        factory( \App\Models\ChallengeComment::class )->times( 30 )->create();
    }
}
