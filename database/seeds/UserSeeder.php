<?php
/**
 * User Seeder
 */
use Illuminate\Database\Seeder;

/**
 * This class is a seeder for user model.
 */
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
                'fk_organization_category_id' => '3',
                'email'                       => 'admin@gmail.com',
                'password'                    => bcrypt('umaporn01'),
                'username'                    => 'admin',
                'firstname'                   => 'admin',
                'lastname'                    => 'admin',
                'status'                      => 'public',
            ],
            [
                'fk_permission_id'            => '2',
                'fk_organization_category_id' => '3',
                'email'                       => 'member@gmail.com',
                'password'                    => bcrypt('umaporn01'),
                'username'                    => 'member',
                'firstname'                   => 'member',
                'lastname'                    => 'member',
                'status'                      => 'public',
            ],
        ];

        foreach( $users as $item ){
            DB::table( 'users' )->insert( $item );
        }

    }
}
