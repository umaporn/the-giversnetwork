<?php
/**
 * Share Image Factory
 */

use Faker\Generator as Faker;

/** @var \Illuminate\Database\Eloquent\Factory $factory Share Image factory */
$factory->define( \App\Models\ShareImage::class, function( Faker $faker ){
    return [
        'fk_share_id' => $faker->numberBetween( 1,30 ),
        'original'    => 'https://placeimg.com/700/400',
        'thumbnail'   => 'https://placeimg.com/300/180',
        'alt_english' => $faker->text( 50 ),
        'alt_thai'    => $faker->text( 50 ),
    ];
} );