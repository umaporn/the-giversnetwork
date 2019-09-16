<?php
/**
 * Share Like Factory
 */

use Faker\Generator as Faker;

/** @var \Illuminate\Database\Eloquent\Factory $factory Share Like factory */
$factory->define( \App\Models\ShareLike::class, function( Faker $faker ){
    return [
        'fk_share_id' => $faker->numberBetween( 1, 5 ),
        'fk_user_id'  => $faker->numberBetween( 1, 2 ),
        'count'       => $faker->numberBetween( 1, 30 ),
    ];
} );