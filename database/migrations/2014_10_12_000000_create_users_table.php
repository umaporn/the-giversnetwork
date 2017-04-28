<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Create/drop a user table.
 */
class CreateUsersTable extends Migration
{
    const Table = 'users';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create( self::Table, function( Blueprint $table ){
            $table->increments( 'id' );
            $table->string( 'email', 254 )->unique();
            $table->string( 'password', 255 );
            $table->rememberToken();
            $table->timestamps();
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
