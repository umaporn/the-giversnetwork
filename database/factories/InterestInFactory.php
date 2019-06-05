<?php
/**
 * Interest in Factory
 */

use Faker\Generator as Faker;

/** @var \Illuminate\Database\Eloquent\Factory $factory Interest in factory */
$factory->define( \App\Models\InterestIn::class, function( Faker $faker ){
    return [
        'title_thai'    => $faker->text( 10 ),
        'title_english' => $faker->text( 10 ),
        'thumbnail'     => $faker->imageUrl( 300, 300 ),
    ];
} );