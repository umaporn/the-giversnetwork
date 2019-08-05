<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterOrganizationTable extends Migration
{
    const Table = 'organization';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table( self::Table, function( Blueprint $table ){
            $table->string( 'name_thai', 255 )->nullable()->after( 'fk_category_id' );
            $table->text( 'content_thai' )->nullable()->after( 'name_english' );
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
            $table->string( 'name_thai', 255 );
            $table->text( 'content_thai' );
        } );
    }
}
