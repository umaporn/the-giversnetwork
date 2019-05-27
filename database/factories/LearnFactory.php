<?php
/**
 * Learn Factory
 */

use Faker\Generator as Faker;

/** @var \Illuminate\Database\Eloquent\Factory $factory Learn factory */
$factory->define( \App\Models\Learn::class, function( Faker $faker ){
    return [
        'fk_category_id'   => $faker->numberBetween( 1, 10 ),
        'title_thai'       => $faker->text( 100 ),
        'title_english'    => $faker->text( 100 ),
        'content_thai'     => $faker->text( 255 ),
        'content_english'  => $faker->text( 255 ),
        'file_path'        => $faker->imageUrl( 700, 400 ),
        'view'             => $faker->numberBetween( 1, 1000 ),
        'status'           => $faker->randomElement( [ 'public', 'draft' ] ),
        'highlight_status' => $faker->randomElement( [ 'pinned', 'unpinned' ] ),
        'type'             => $faker->text( 75 ),
        'public_date'      => $faker->date( 'Y-m-d' ),
    ];
} );