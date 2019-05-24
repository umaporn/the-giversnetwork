<?php
/**
 * News Image Factory
 */

use Faker\Generator as Faker;

/** @var \Illuminate\Database\Eloquent\Factory $factory News Image factory */
$factory->define( \App\Models\NewsImage::class, function( Faker $faker ){
    return [
        'original'    => $faker->imageUrl( 700, 400 ),
        'thumbnail'   => $faker->imageUrl( 300, 150 ),
        'alt_english' => $faker->text( 50 ),
        'alt_thai'    => $faker->text( 50 ),
    ];
} );