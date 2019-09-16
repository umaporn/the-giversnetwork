<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration
{
    const Table = 'events';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create( self::Table, function( Blueprint $table ){
            $table->increments( 'id' );
            $table->unsignedInteger( 'fk_user_id' )->nullable();
            $table->foreign( 'fk_user_id' )->references( 'id' )->on( 'users' );
            $table->string( 'title_thai', 255 );
            $table->string( 'title_english', 255 );
            $table->text( 'description_thai' );
            $table->text( 'description_english' );
            $table->string( 'location_thai', 255 );
            $table->string( 'location_english', 255 );
            $table->string( 'host_thai', 255 )->nullable();
            $table->string( 'host_english', 255 )->nullable();
            $table->string( 'host_image' );
            $table->string( 'link', 255 );
            $table->date( 'start_date' );
            $table->date( 'end_date' );
            $table->string( 'event_date', 255 );
            $table->string( 'image_path' );
            $table->integer( 'view' );
            $table->enum( 'status', [ 'public', 'draft' ] );
            $table->enum( 'upcoming_status', [ 'yes', 'no' ] );
            $table->timestamp( 'updated_at' );
            $table->timestamp( 'created_at' )->useCurrent();
        } );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists( self::Table );
    }
}
