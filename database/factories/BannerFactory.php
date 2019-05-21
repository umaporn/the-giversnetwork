<?php
/**
 * Banner Factory
 */

use Faker\Generator as Faker;

/** @var \Illuminate\Database\Eloquent\Factory $factory Banner factory */
$factory->define( \App\Models\Banner::class, function( Faker $faker ){
    return [
        'title_thai'         => $faker->text( 10 ),
        'title_english'      => $faker->text( 10 ),
        'image_path_thai'    => $faker->imageUrl( 1900, 500, 'cats' ),
        'image_path_english' => $faker->imageUrl( 1900, 500, 'cats' ),
        'order'              => $faker->unique()->numberBetween( 1, 10 ),
        'link'               => $faker->url,
        'start_date'         => $faker->date( 'Y-m-d' ),
        'end_date'           => $faker->date( 'Y-m-d', '+5 days' ),
        'status'             => $faker->randomElement( [ 'public', 'draft' ] ),
    ];
} );