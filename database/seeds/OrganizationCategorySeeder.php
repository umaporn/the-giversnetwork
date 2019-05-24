<?php
/**
 * Organization Category Seeder
 */
use Illuminate\Database\Seeder;

/**
 * This class is a seeder for organization category model.
 */
class OrganizationCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory( \App\Models\OrganizationCategory::class, 10 )->create();
    }
}
