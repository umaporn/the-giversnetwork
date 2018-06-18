<?php
/**
 * Drop a user table.
 */

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Drop a user table.
 */
class DropUsersTable extends Migration
{
    /** Table name */
    private const Table = 'users';

    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::dropIfExists( self::Table );
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::create( self::Table, function( Blueprint $table ){
            $table->increments( 'id' );
            $table->string( 'email', 254 )->unique();
            $table->string( 'password', 255 );
            $table->rememberToken();
            $table->timestamps();
        } );
    }
}
