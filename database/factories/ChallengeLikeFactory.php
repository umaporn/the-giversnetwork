<?php
/**
 * Challenge Like Factory
 */

use Faker\Generator as Faker;

/** @var \Illuminate\Database\Eloquent\Factory $factory Challenge Like factory */
$factory->define( \App\Models\ChallengeLike::class, function( Faker $faker ){
    return [
        'fk_challenge_id' => $faker->numberBetween( 1, 5 ),
        'fk_user_id'      => $faker->numberBetween( 1, 2 ),
        'count'           => $faker->numberBetween( 1, 30 ),
    ];
} );