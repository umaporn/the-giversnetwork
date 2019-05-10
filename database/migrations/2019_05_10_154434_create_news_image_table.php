<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewsImageTable extends Migration
{
    const Table = 'news_image';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create( self::Table, function( Blueprint $table ){
            $table->increments( 'id' );
            $table->unsignedInteger( 'fk_news_id' );
            $table->foreign( 'fk_news_id' )->references( 'id' )->on( 'news' );
            $table->string( 'original', 255 );
            $table->string( 'thumbnail', 255 );
            $table->string( 'alt_thai', 255 );
            $table->string( 'alt_english', 255 );
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
