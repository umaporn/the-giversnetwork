<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersInterestInTable extends Migration
{

    const Table = 'users_interest_in';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(self::Table, function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger( 'fk_interest_in_id' )->nullable();
            $table->foreign( 'fk_interest_in_id' )->references( 'id' )->on( 'interest_in' );
            $table->unsignedInteger( 'fk_user_id' )->nullable();
            $table->foreign( 'fk_user_id' )->references( 'id' )->on( 'users' );
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(self::Table);
    }
}
