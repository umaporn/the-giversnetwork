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
        //factory( \App\Models\GiveCategory::class )->times( 10 )->create();
        $giveCategory = config( 'give_category' );
        foreach( $giveCategory as $item ){
            DB::table( 'give_category' )->insert( $item );
        }
    }
}
