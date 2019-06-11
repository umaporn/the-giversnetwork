<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChallengeCommentTable extends Migration
{
    const Table = 'challenge_comment';

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
            $table->unsignedInteger( 'fk_challenge_id' );
            $table->foreign( 'fk_challenge_id' )->references( 'id' )->on( 'challenge' );
            $table->integer( 'parent_id' )->nullable();
            $table->string( 'comment_text', 255 );
            $table->enum( 'status', [ 'public', 'draft' ] );
            $table->date( 'public_date' );
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
