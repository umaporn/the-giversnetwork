<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldsForGiveTable extends Migration
{

    const Table = 'give';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table( self::Table, function( Blueprint $table ){
            $table->text( 'purpose' )->nullable();
            $table->text( 'beneficiary' )->nullable();
            $table->string( 'owner',255 )->nullable();
            $table->string('date_required', 255)->nullable();
        } );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
