<?php
/**
 * Share Image Factory
 */

use Faker\Generator as Faker;

/** @var \Illuminate\Database\Eloquent\Factory $factory Share Image factory */
$factory->define( \App\Models\ShareImage::class, function( Faker $faker ){
    return [
        'fk_share_id' => $faker->numberBetween( 1, 5 ),
        'original'    => $faker->imageUrl( 800, 600 ),
        'thumbnail'   => $faker->imageUrl( 300, 150 ),
        'alt_english' => $faker->text( 50 ),
        'alt_thai'    => $faker->text( 50 ),
    ];
} );