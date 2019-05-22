<?php
/**
 * Share Factory
 */

use Faker\Generator as Faker;

/** @var \Illuminate\Database\Eloquent\Factory $factory Share factory */
$factory->define( \App\Models\Share::class, function( Faker $faker ){
    return [
        'fk_user_id'          => '1',
        'fk_category_id'      => '8',
        'title_thai'          => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
        'title_english'       => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
        'description_thai'    => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
        'description_english' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
        'file_path'           => 'https://upload.wikimedia.org/wikipedia/commons/0/02/Fire_breathing_2_Luc_Viatour.jpg',
        'view'                => '40',
        'status'              => 'public',
    ];
} );