<?php
/**
 * Organization Category Factory
 */

use Faker\Generator as Faker;

/** @var \Illuminate\Database\Eloquent\Factory $factory Organization Category factory */
$factory->define( \App\Models\OrganizationCategory::class, function( Faker $faker ){
    return [
        'title_thai'                 => $faker->text( 10 ),
        'title_english'              => $faker->text( 10 ),
    ];
} );