<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DropColumnsTitleNewsTable extends Migration
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
            $table->dropColumn( 'title_thai' );
            $table->dropColumn( 'description_thai' );
            $table->dropColumn( 'content_thai' );
            $table->dropColumn( 'type' );
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
