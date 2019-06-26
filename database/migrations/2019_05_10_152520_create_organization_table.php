<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrganizationTable extends Migration
{
    const Table = 'organization';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create( self::Table, function( Blueprint $table ){
            $table->increments( 'id' );
            $table->unsignedInteger( 'fk_category_id' )->nullable();;
            $table->foreign( 'fk_category_id' )->references( 'id' )->on( 'organization_category' );
            $table->string( 'name_thai', 255 );
            $table->string( 'name_english', 255 );
            $table->string( 'image_path', 255 );
            $table->string( 'email', 254 )->unique();
            $table->string( 'phone_number', 15 );
            $table->text( 'address' );
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
