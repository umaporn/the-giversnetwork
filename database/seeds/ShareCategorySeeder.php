<?php
/**
 * Share Category Seeder
 */

use Illuminate\Database\Seeder;

/**
 * This class is a seeder for share model.
 */
class ShareCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $category = [
            [
                'title_thai'    => 'Challenge',
                'title_english' => 'Challenge',
            ],
        ];
        DB::table( 'share_category' )->insert( $category );

        factory( \App\Models\ShareCategory::class )->times( 10 )->create();
    }
}
