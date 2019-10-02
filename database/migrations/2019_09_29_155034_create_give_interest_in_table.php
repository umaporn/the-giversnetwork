<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGiveInterestInTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('give_interest_in', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger( 'fk_interest_in_id' )->nullable();
            $table->foreign( 'fk_interest_in_id' )->references( 'id' )->on( 'interest_in' );
            $table->unsignedInteger( 'fk_give_id' )->nullable();
            $table->foreign( 'fk_give_id' )->references( 'id' )->on( 'give' );
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
        Schema::dropIfExists('give_interest_in');
    }
}
