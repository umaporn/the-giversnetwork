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
        factory( \App\Models\Learn::class, 10 )->create();
    }
}
