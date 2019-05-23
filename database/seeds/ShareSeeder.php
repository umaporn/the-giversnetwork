<?php
/**
 * Share Seeder
 */

use App\Models\ShareImage;
use App\Models\ShareComment;
use App\Models\ShareLike;
use Illuminate\Database\Seeder;

/**
 * This class is a seeder for News model.
 */
class ShareSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $share = [
            [
                'fk_user_id'          => '1',
                'fk_category_id'      => '2',
                'title_thai'          => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
                'title_english'       => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
                'description_thai'    => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
                'description_english' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
                'file_path'           => 'https://upload.wikimedia.org/wikipedia/commons/0/02/Fire_breathing_2_Luc_Viatour.jpg',
                'view'                => '20',
                'status'              => 'public',
            ],
            [
                'fk_user_id'          => '1',
                'fk_category_id'      => '3',
                'title_thai'          => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
                'title_english'       => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
                'description_thai'    => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
                'description_english' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
                'file_path'           => 'https://upload.wikimedia.org/wikipedia/commons/0/02/Fire_breathing_2_Luc_Viatour.jpg',
                'view'                => '40',
                'status'              => 'public',
            ],
        ];

        foreach( $share as $item ){
            DB::table( 'share' )->insert( $item );
        }
    }
}
