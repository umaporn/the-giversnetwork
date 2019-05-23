<?php

use Illuminate\Database\Seeder;

class LearnSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory( \App\Models\Learn::class, 10 )->create();
    }
}
