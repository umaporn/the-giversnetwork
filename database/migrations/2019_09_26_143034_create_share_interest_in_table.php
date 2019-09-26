<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShareInterestInTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('share_interest_in', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger( 'fk_interest_in_id' )->nullable();
            $table->foreign( 'fk_interest_in_id' )->references( 'id' )->on( 'interest_in' );
            $table->unsignedInteger( 'fk_share_id' )->nullable();
            $table->foreign( 'fk_share_id' )->references( 'id' )->on( 'share' );
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
        Schema::dropIfExists('share_interest_in');
    }
}
