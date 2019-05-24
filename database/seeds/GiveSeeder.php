<?php
/**
 * Give Seeder
 */

use Illuminate\Database\Seeder;

/**
 * This class is a seeder for give model.
 */
class GiveSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        factory( \App\Models\Give::class )->times( 100 )->create();
    }
}
