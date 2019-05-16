<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'fk_permission_id'            => '1',
                'fk_interest_in_id'           => '2',
                'fk_organization_category_id' => '3',
                'email'                       => 'admin@gmail.com',
                'password'                    => bcrypt('umaporn01'),
                'username'                    => 'umaporn01',
                'firstname'                   => 'umaporn',
                'lastname'                    => 'umaporns',
                'status'                      => 'public',
            ],
            [
                'fk_permission_id'            => '2',
                'fk_interest_in_id'           => '2',
                'fk_organization_category_id' => '3',
                'email'                       => 'member@gmail.com',
                'password'                    => bcrypt('umaporn01'),
                'username'                    => 'umaporn01',
                'firstname'                   => 'umaporn',
                'lastname'                    => 'umaporns',
                'status'                      => 'public',
            ],
        ];

        foreach( $users as $item ){
            DB::table( 'users' )->insert( $item );
        }

    }
}
