<?php
/**
 * Events Seeder
 */
use Illuminate\Database\Seeder;

/**
 * This class is a seeder for events model.
 */
class EventsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory( \App\Models\Events::class, 10 )->create();
       /* $events = config('events');
        foreach( $events as $item ){
            DB::table( 'events' )->insert( $item );
        }*/
    }
}
