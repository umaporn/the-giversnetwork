<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterNewsTitleTable extends Migration
{
    const Table = 'news';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table( self::Table, function( Blueprint $table ){
            $table->string( 'title_thai', 255 )->nullable()->after( 'id' );
            $table->text( 'description_thai' )->nullable()->after( 'title_english' );
            $table->string( 'content_thai', 255 )->nullable()->after( 'description_english' );
            $table->string( 'type', 255 )->nullable()->after( 'content_english' );
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
            $table->string( 'content_thai', 255 );
            $table->string( 'type', 255 );
        } );
    }
}
