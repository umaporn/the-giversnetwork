<?php
/**
 * Drop a password reset table.
 */

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Drop a password reset table.
 */
class DropPasswordResetsTable extends Migration
{
    /** Table name */
    private const Table = 'password_resets';

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
            $table->string( 'email', 254 )->index();
            $table->string( 'token', 100 );
            $table->timestamp( 'created_at' )->nullable();
        } );
    }
}
