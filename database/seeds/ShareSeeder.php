<?php
/**
 * Share Seeder
 */

use Illuminate\Database\Seeder;

/**
 * This class is a seeder for share model.
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
