<?php
/**
 * GiveCategory Factory
 */

use Faker\Generator as Faker;

/** @var \Illuminate\Database\Eloquent\Factory $factory \App\Models\GiveCategory factory */
$factory->define( \App\Models\GiveCategory::class, function( Faker $faker ){
    return [
        'title_thai'          => $faker->text( 50 ),
        'title_english'       => $faker->text( 50 ),
    ];
} );