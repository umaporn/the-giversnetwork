<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBannerTable extends Migration
{
    const Table = 'banner';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create( self::Table, function( Blueprint $table ){
            $table->increments( 'id' );
            $table->string( 'title_thai', 255 );
            $table->string( 'title_english', 255 );
            $table->string( 'image_path_thai', 255 );
            $table->string( 'image_path_english', 255 );
            $table->integer( 'order' );
            $table->date( 'start_date' );
            $table->date( 'end_date' );
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
