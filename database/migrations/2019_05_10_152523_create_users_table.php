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
            $table->unsignedInteger( 'fk_permission_id' );
            $table->foreign( 'fk_permission_id' )->references( 'id' )->on( 'permission' );
            $table->unsignedInteger( 'fk_interest_in_id' );
            $table->foreign( 'fk_interest_in_id' )->references( 'id' )->on( 'interest_in' );
            $table->string( 'email', 254 )->unique();
            $table->string( 'password', 10 );
            $table->string( 'username', 255 );
            $table->string( 'image_path', 255 );
            $table->string( 'firstname', 255 );
            $table->string( 'lastname', 255 );
            $table->string( 'phone_number', 15 );
            $table->enum( 'status', [ 'public', 'draft' ] );
            $table->rememberToken();
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
