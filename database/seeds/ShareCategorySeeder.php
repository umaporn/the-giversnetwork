<?php
/**
 * Share Category Seeder
 */

use Illuminate\Database\Seeder;

/**
 * This class is a seeder for share category model.
 */
class ShareCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        factory( \App\Models\ShareCategory::class )->times( 10 )->create();
    }
}
