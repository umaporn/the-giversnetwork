<?php
/**
 * Give Category Seeder
 */

use Illuminate\Database\Seeder;

/**
 * This class is a seeder for give category model.
 */
class GiveCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        factory( \App\Models\GiveCategory::class )->times( 10 )->create();
    }
}
