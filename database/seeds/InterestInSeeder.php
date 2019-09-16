<?php
/**
 * Interest in Seeder
 */
use Illuminate\Database\Seeder;

/**
 * This class is a seeder for interest in model.
 */
class InterestInSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //factory( \App\Models\InterestIn::class, 10 )->create();
        $interestIn = config('interest_in');
        foreach( $interestIn as $item ){
            DB::table( 'interest_in' )->insert( $item );
        }
    }
}
