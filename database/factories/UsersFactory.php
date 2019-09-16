<?php
/**
 * Users Factory
 */

use Faker\Generator as Faker;

/** @var \Illuminate\Database\Eloquent\Factory $factory News Image factory */
$factory->define( \App\Models\Users::class, function( Faker $faker ){
    return [
        'fk_permission_id'            => '2',
        'fk_organization_category_id' => '3',
        'email'                       => $faker->email,
        'password'                    => bcrypt( 'umaporn01' ),
        'username'                    => $faker->name,
        'firstname'                   => $faker->firstName,
        'lastname'                    => $faker->lastName,
        'status'                      => 'public',
    ];
} );