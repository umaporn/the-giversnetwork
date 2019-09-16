<?php
/**
 * News Factory
 */

use Faker\Generator as Faker;

/** @var \Illuminate\Database\Eloquent\Factory $factory News factory */
$factory->define( \App\Models\News::class, function( Faker $faker ){
    return [
        'title_thai'          => $faker->text( 75 ),
        'title_english'       => $faker->text( 75 ),
        'description_thai'    => $faker->text( 255 ),
        'description_english' => $faker->text( 255 ),
        'content_thai'        => $faker->paragraphs( 2, true ),
        'content_english'     => $faker->paragraphs( 2, true ),
        'type'                => $faker->text( 75 ),
        'view'                => $faker->numberBetween( 1, 40 ),
        'status'              => $faker->randomElement( [ 'public', 'draft' ] ),
        'public_date'         => $faker->date( 'Y-m-d' ),
    ];
} );