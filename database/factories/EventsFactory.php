<?php
/**
 * Event Factory
 */

use Faker\Generator as Faker;

/** @var \Illuminate\Database\Eloquent\Factory $factory Event factory */
$factory->define( \App\Models\Events::class, function( Faker $faker ){
    return [
        'title_thai'          => $faker->text( 10 ),
        'title_english'       => $faker->text( 10 ),
        'description_thai'    => $faker->text( 255 ),
        'description_english' => $faker->text( 255 ),
        'location_thai'       => $faker->text( 255 ),
        'location_english'    => $faker->text( 255 ),
        'host_thai'           => $faker->text( 255 ),
        'host_english'        => $faker->text( 255 ),
        'image_path'          => $faker->imageUrl( 700, 400 ),
        'link'                => $faker->url,
        'view'                => $faker->numberBetween( 1, 40 ),
        'event_date'          => $faker->date( 'd F Y H:i - H:i' ),
        'start_date'          => $faker->date( 'Y-m-d' ),
        'end_date'            => $faker->date( 'Y-m-d', '+5 days' ),
        'status'              => $faker->randomElement( [ 'public', 'draft' ] ),
        'upcoming_status'     => $faker->randomElement( [ 'yes', 'no' ] ),
    ];
} );