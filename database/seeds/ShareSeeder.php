<?php
/**
 * Share Seeder
 */

use App\Models\ShareImage;
use App\Models\ShareComment;
use App\Models\ShareLike;
use Illuminate\Database\Seeder;

/**
 * This class is a seeder for News model.
 */
class ShareSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        factory( \App\Models\Share::class )->times( 30 )->create();
    }
}
