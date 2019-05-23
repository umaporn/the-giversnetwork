<?php
/**
 * LearnCategory Factory
 */

use Faker\Generator as Faker;

/** @var \Illuminate\Database\Eloquent\Factory $factory \App\Models\LearnCategory factory */
$factory->define( \App\Models\LearnCategory::class, function( Faker $faker ){
    return [
        'title_thai'          => $faker->text( 10 ),
        'title_english'       => $faker->text( 10 ),
    ];
} );