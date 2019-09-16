<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShareLikeTable extends Migration
{
    const Table = 'share_like';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create( self::Table, function( Blueprint $table ){
            $table->increments( 'id' );
            $table->unsignedInteger( 'fk_user_id' );
            $table->foreign( 'fk_user_id' )->references( 'id' )->on( 'users' );
            $table->unsignedInteger( 'fk_share_id' );
            $table->foreign( 'fk_share_id' )->references( 'id' )->on( 'share' );
            $table->integer( 'count' );
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
