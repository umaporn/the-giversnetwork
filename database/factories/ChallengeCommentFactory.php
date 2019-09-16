<?php
/**
 * Challenge Factory
 */

use Faker\Generator as Faker;

/** @var \Illuminate\Database\Eloquent\Factory $factory Challenge factory */
$factory->define( \App\Models\ChallengeComment::class, function( Faker $faker ){
    return [
        'fk_challenge_id'  => $faker->numberBetween( 1, 5 ),
        'fk_user_id'   => $faker->numberBetween( 1, 2 ),
        'parent_id'    => $faker->numberBetween( 0, 1 ),
        'comment_text' => $faker->text( 75 ),
        'status'       => $faker->randomElement( [ 'public', 'draft' ] ),
        'public_date'  => $faker->date( 'Y-m-d' ),
    ];
} );