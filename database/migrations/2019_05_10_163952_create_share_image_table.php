<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShareImageTable extends Migration
{
    const Table = 'share_image';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create( self::Table, function( Blueprint $table ){
            $table->increments( 'id' );
            $table->unsignedInteger( 'fk_share_id' )->nullable();
            $table->foreign( 'fk_share_id' )->references( 'id' )->on( 'share' );
            $table->string( 'original', 255 );
            $table->string( 'thumbnail', 255 );
            $table->string( 'alt_thai', 255 )->nullable();
            $table->string( 'alt_english', 255 )->nullable();
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
