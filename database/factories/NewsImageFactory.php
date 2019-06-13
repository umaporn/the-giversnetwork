<?php
/**
 * News Image Factory
 */

use Faker\Generator as Faker;

/** @var \Illuminate\Database\Eloquent\Factory $factory News Image factory */
$factory->define( \App\Models\NewsImage::class, function( Faker $faker ){
    return [
        'original'    => 'https://placeimg.com/700/400',
        'thumbnail'   => 'https://placeimg.com/300/150',
        'alt_english' => $faker->text( 50 ),
        'alt_thai'    => $faker->text( 50 ),
    ];
} );