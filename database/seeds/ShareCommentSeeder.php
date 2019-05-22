<?php
/**
 * Share Comment Seeder
 */

use Illuminate\Database\Seeder;

/**
 * This class is a seeder for share model.
 */
class ShareCommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        factory( \App\Models\ShareComment::class )->times( 30 )->create();
    }
}
