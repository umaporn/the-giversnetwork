<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddOrganizationGoogleMap extends Migration
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
            $table->text( 'google_map_embed' )->nullable()->after( 'address' );
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
            $table->dropColumn( 'google_map_embed' );
        } );
    }
}
