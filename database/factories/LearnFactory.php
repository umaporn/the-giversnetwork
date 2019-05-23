<?php
/**
 * Learn Factory
 */

use Faker\Generator as Faker;

/** @var \Illuminate\Database\Eloquent\Factory $factory Learn factory */
$factory->define( \App\Models\Learn::class, function( Faker $faker ){
    return [
        'fk_category_id'   => $faker->numberBetween( 1, 10 ),
        'title_thai'       => $faker->text( 10 ),
        'title_english'    => $faker->text( 10 ),
        'content_thai'     => $faker->text( 255 ),
        'content_english'  => $faker->text( 255 ),
        'file_path'        => $faker->imageUrl( 350, 200 ),
        'view'             => $faker->numberBetween( 1, 40 ),
        'status'           => $faker->randomElement( [ 'public', 'draft' ] ),
        'highlight_status' => $faker->randomElement( [ 'pined', 'unpined' ] ),
        'type'             => $faker->text( 75 ),
        'public_date'      => $faker->date( 'Y-m-d' ),
    ];
} );