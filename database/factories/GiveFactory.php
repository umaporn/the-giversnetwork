<?php
/**
 * Give Factory
 */

use Faker\Generator as Faker;

/** @var \Illuminate\Database\Eloquent\Factory $factory Give factory */
$factory->define( \App\Models\Give::class, function( Faker $faker ){
    return [
        'fk_user_id'          => $faker->numberBetween( 1, 2 ),
        'fk_category_id'      => $faker->numberBetween( 1, 10 ),
        'type'                => $faker->randomElement( [ 'give', 'receive' ] ),
        'title_thai'          => $faker->text( 100 ),
        'title_english'       => $faker->text( 100 ),
        'description_thai'    => $faker->text( 255 ),
        'description_english' => $faker->text( 255 ),
        'amount'              => $faker->numberBetween( 1, 40 ),
        'address'             => $faker->text( 255 ),
        'view'                => $faker->numberBetween( 1, 40 ),
        'expired_date'         => $faker->date( 'Y-m-d' ),
        'status'              => $faker->randomElement( [ 'public', 'draft' ] ),
    ];
} );