<?php

use Illuminate\Database\Seeder;

class LearnCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory( \App\Models\LearnCategory::class, 10 )->create();
    }
}
