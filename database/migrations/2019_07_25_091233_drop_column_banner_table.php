<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DropColumnBannerTable extends Migration
{
    const Table = 'banner';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table( self::Table, function( Blueprint $table ){
            $table->dropColumn( 'title_thai' );
            $table->dropColumn( 'image_path_thai' );
            $table->dropColumn( 'image_path_english' );
            $table->dropColumn( 'order' );
            $table->dropColumn( 'link' );
            $table->dropColumn( 'start_date' );
            $table->dropColumn( 'end_date' );
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
            $table->string( 'image_path_thai', 255 );
            $table->string( 'image_path_english', 255 );
            $table->integer( 'order' );
            $table->string( 'link', 255 );
            $table->date( 'start_date' );
            $table->date( 'end_date' );
        } );
    }
}
