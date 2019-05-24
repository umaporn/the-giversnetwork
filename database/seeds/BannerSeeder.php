<?php
/**
 * Banner Seeder
 */
use Illuminate\Database\Seeder;

/**
 * This class is a seeder for banner model.
 */
class BannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory( \App\Models\Banner::class, 10 )->create();
    }
}
