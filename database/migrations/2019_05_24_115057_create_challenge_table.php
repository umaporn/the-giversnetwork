<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChallengeTable extends Migration
{
    const Table = 'challenge';

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
            $table->unsignedInteger( 'fk_category_id' )->nullable();
            $table->foreign( 'fk_category_id' )->references( 'id' )->on( 'challenge_category' );
            $table->string( 'title_thai', 255 );
            $table->string( 'title_english', 255 );
            $table->string( 'description_thai', 255 );
            $table->string( 'description_english', 255 );
            $table->text( 'content_thai' );
            $table->text( 'content_english' );
            $table->string( 'file_path', 255 );
            $table->integer( 'view' );
            $table->enum( 'status', [ 'public', 'draft' ] );
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
