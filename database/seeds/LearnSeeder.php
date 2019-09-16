<?php
/**
 * Learn Seeder
 */

use Illuminate\Database\Seeder;

/**
 * This class is a seeder for learn model.
 */
class LearnSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //factory( \App\Models\Learn::class, 30 )->create();
        $learn = config('learn');
        foreach( $learn as $item ){
            DB::table( 'learn' )->insert( $item );
        }
    }
}
