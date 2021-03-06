<?php
/**
 * Challenge Factory
 */

use Faker\Generator as Faker;

/** @var \Illuminate\Database\Eloquent\Factory $factory Challenge factory */
$factory->define( \App\Models\Challenge::class, function( Faker $faker ){
    return [
        'fk_user_id'          => $faker->numberBetween( 1, 2 ),
        'fk_category_id'      => $faker->numberBetween( 1, 10 ),
        'title_thai'          => $faker->text( 100 ),
        'title_english'       => $faker->text( 100 ),
        'description_thai'    => $faker->text( 255 ),
        'description_english' => $faker->text( 255 ),
        'content_thai'        => $faker->paragraphs( 20, true ),
        'content_english'     => $faker->paragraphs( 20, true ),
        'file_path'           => 'https://placeimg.com/700/400',
        'view'                => $faker->numberBetween( 1, 100 ),
        'status'              => $faker->randomElement( [ 'public', 'draft' ] ),
    ];
} );