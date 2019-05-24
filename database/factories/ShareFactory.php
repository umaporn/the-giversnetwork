<?php
/**
 * Share Factory
 */

use Faker\Generator as Faker;

/** @var \Illuminate\Database\Eloquent\Factory $factory Share factory */
$factory->define( \App\Models\Share::class, function( Faker $faker ){
    return [
        'fk_user_id'          => $faker->numberBetween( 1, 2 ),
        'fk_category_id'      => $faker->numberBetween( 1, 10 ),
        'title_thai'          => $faker->text( 100 ),
        'title_english'       => $faker->text( 100 ),
        'description_thai'    => $faker->text( 255 ),
        'description_english' => $faker->text( 255 ),
        'file_path'           => $faker->imageUrl( 300, 180 ),
        'view'                => $faker->numberBetween( 1, 100 ),
        'status'              => $faker->randomElement( [ 'public', 'draft' ] ),
    ];
} );