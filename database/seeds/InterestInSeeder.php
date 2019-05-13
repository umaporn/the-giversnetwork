<?php

use Illuminate\Database\Seeder;

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
