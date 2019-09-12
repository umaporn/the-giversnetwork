<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsRegistrationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create( 'events_registration', function( Blueprint $table ){
            $table->increments( 'id' );
            $table->string( 'first_name', 255 );
            $table->string( 'last_name', 255 );
            $table->string( 'phone', 255 );
            $table->string( 'email', 255 );
            $table->enum( 'gender', [ 'male', 'female' ] );
            $table->string( 'profession', 255 );
            $table->string( 'country', 255 );
            $table->string( 'utm_source', 255 )->nullable();
            $table->string( 'utm_medium', 255 )->nullable();
            $table->string( 'utm_content', 255 )->nullable();
            $table->string( 'utm_campaign', 255 )->nullable();
            $table->string( 'utm_term', 255 )->nullable();
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
        Schema::dropIfExists( 'events_registration' );
    }
}
