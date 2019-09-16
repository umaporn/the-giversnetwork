<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddGiveDescription extends Migration
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
            $table->text( 'description_thai' )->nullable()->after( 'title_english' );
            $table->text( 'description_english' )->nullable()->after( 'description_thai' );
            $table->integer( 'amount' )->nullable()->after( 'description_english' );
        } );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table( self::Table, function( Blueprint $table ){
            $table->dropColumn( 'description_thai' );
            $table->dropColumn( 'description_english' );
            $table->dropColumn( 'amount' );
        } );
    }
}
