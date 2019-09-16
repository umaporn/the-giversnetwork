<?php
/**
 * Organization  Seeder
 */

use Illuminate\Database\Seeder;

/**
 * This class is a seeder for organization category model.
 */
class OrganizationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //factory( \App\Models\Organization::class, 20 )->create();
        $organizations = config('organization');
        foreach( $organizations as $item ){
            DB::table( 'organization' )->insert( $item );
        }
    }
}
