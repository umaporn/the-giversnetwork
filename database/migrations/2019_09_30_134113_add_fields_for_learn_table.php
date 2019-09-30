<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldsForLearnTable extends Migration
{
    const Table = 'learn';
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table( self::Table, function( Blueprint $table ){
            $table->text( 'purpose_thai' )->nullable();
            $table->text( 'purpose_english' )->nullable();
            $table->text( 'key_learning_thai' )->nullable();
            $table->text( 'key_learning_english' )->nullable();
            $table->text( 'owner_thai' )->nullable();
            $table->text( 'owner_english' )->nullable();
            $table->string( 'document_path', 255 )->nullable();
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
            $table->dropColumn( 'purpose_thai' );
            $table->dropColumn( 'purpose_english' );
            $table->dropColumn( 'key_learning_thai' );
            $table->dropColumn( 'key_learning_english' );
            $table->dropColumn( 'owner_thai' );
            $table->dropColumn( 'owner_english' );
            $table->dropColumn( 'document_path' );

        } );
    }
}
