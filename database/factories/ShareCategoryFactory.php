<?php
/**
 * Share Category Factory
 */

use Faker\Generator as Faker;

/** @var \Illuminate\Database\Eloquent\Factory $factory Share category factory */
$factory->define( \App\Models\ShareCategory::class, function( Faker $faker ){
    return [
        'title_thai'         => $faker->text( 10 ),
        'title_english'      => $faker->text( 10 ),
    ];
} );