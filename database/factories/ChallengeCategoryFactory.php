<?php
/**
 * Challenge Category Factory
 */

use Faker\Generator as Faker;

/** @var \Illuminate\Database\Eloquent\Factory $factory Challenge category factory */
$factory->define( \App\Models\ChallengeCategory::class, function( Faker $faker ){
    return [
        'title_thai'         => $faker->text( 10 ),
        'title_english'      => $faker->text( 10 ),
    ];
} );