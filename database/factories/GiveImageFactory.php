<?php
/**
 * Give Image Factory
 */

use Faker\Generator as Faker;

/** @var \Illuminate\Database\Eloquent\Factory $factory Give Image factory */
$factory->define( \App\Models\GiveImage::class, function( Faker $faker ){
    return [
        'fk_give_id'  => $faker->numberBetween( 1, 100 ),
        'original'    => 'https://placeimg.com/700/400',
        'thumbnail'   => 'https://placeimg.com/300/150',
        'alt_english' => $faker->text( 50 ),
        'alt_thai'    => $faker->text( 50 ),
    ];
} );