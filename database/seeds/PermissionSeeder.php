<?php

use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permission = [
            [
                'scope'    => 'admin',

            ],
            [
                'scope'    => 'member',

            ],
        ];

        foreach( $permission as $item ){
            DB::table( 'permission' )->insert( [
                                                   'scope'    => $item['scope'],
                                               ] );
        }

    }
}
