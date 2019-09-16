<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChallengeImageTable extends Migration
{
    const Table = 'challenge_image';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create( self::Table, function( Blueprint $table ){
            $table->increments( 'id' );
            $table->unsignedInteger( 'fk_challenge_id' );
            $table->foreign( 'fk_challenge_id' )->references( 'id' )->on( 'challenge' );
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
