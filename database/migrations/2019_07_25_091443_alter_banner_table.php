<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterBannerTable extends Migration
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
            $table->string( 'title_thai', 255 )->nullable()->after( 'id' );
            $table->string( 'image_path_thai', 255 )->nullable()->after( 'title_english' );
            $table->string( 'image_path_english', 255 )->nullable()->after( 'image_path_thai' );
            $table->integer( 'order' )->nullable()->after( 'image_path_english' );
            $table->string( 'link', 255 )->nullable()->after( 'order' );
            $table->date( 'start_date' )->nullable()->after( 'link' );
            $table->date( 'end_date' )->nullable()->after( 'start_date' );
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
