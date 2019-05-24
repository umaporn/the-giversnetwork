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
        factory( \App\Models\InterestIn::class, 10 )->create();
    }
}
