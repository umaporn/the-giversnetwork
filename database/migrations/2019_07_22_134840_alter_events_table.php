<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterEventsTable extends Migration
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
            $table->string( 'title_thai', 255 )->nullable()->after('fk_user_id');
            $table->text( 'description_thai' )->nullable()->after('title_english');
            $table->string( 'location_thai', 255 )->nullable()->after('description_english');
            $table->string( 'host_thai', 255 )->nullable()->after('location_english');
            $table->string( 'host_image', 255 )->nullable()->after('host_english');
            $table->string( 'image_path', 255 )->nullable()->after('host_image');
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
