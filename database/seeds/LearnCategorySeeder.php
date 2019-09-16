<?php
/**
 * Learn Category Seeder
 */
use Illuminate\Database\Seeder;

/**
 * This class is a seeder for learn category model.
 */
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
