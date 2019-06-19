<?php
/**
 * Organization  Factory
 */

use Faker\Generator as Faker;

/** @var \Illuminate\Database\Eloquent\Factory $factory Organization  factory */
$factory->define( \App\Models\Organization::class, function( Faker $faker ){
    return [
        'fk_category_id' => $faker->numberBetween( 1, 6 ),
        'name_thai'      => $faker->text( 10 ),
        'name_english'   => $faker->text( 10 ),
        'image_path'     => 'https://placeimg.com/700/400',
        'email'          => $faker->email,
        'phone_number'   => $faker->numberBetween( 1, 1000000 ),
        'address'        => $faker->text( 100 ),
    ];
} );