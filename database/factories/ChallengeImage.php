<?php
/**
 * Challenge Image Factory
 */

use Faker\Generator as Faker;

/** @var \Illuminate\Database\Eloquent\Factory $factory Challenge Image factory */
$factory->define( \App\Models\ChallengeImage::class, function( Faker $faker ){
    return [
        'fk_challenge_id' => $faker->numberBetween( 1, 25 ),
        'original'        => $faker->imageUrl( 700, 400 ),
        'thumbnail'       => $faker->imageUrl( 300, 150 ),
        'alt_english'     => $faker->text( 50 ),
        'alt_thai'        => $faker->text( 50 ),
    ];
} );