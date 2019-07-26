<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DropColumnEventsTable extends Migration
{
    const Table = 'events';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table( self::Table, function( Blueprint $table ){
            $table->dropColumn( 'title_thai' );
            $table->dropColumn( 'description_thai' );
            $table->dropColumn( 'location_thai' );
            $table->dropColumn( 'host_thai' );
            $table->dropColumn( 'host_image' );
            $table->dropColumn( 'image_path' );
        } );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table( self::Table, function( Blueprint $table ){
            $table->string( 'title_thai', 255 );
            $table->text( 'description_thai' );
            $table->string( 'location_thai', 255 );
            $table->string( 'host_thai', 255 );
            $table->string( 'host_image', 255 );
            $table->string( 'image_path', 255 );
        } );
    }
}
