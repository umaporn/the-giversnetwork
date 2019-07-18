<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterChallengeTable extends Migration
{
    const Table = 'challenge';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table( self::Table, function( Blueprint $table ){
            $table->string( 'title_thai', 255 )->nullable()->after('fk_category_id');
            $table->string( 'description_thai', 255 )->nullable()->after('title_english');
            $table->text( 'content_thai' )->nullable()->after('description_english');
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
            $table->string( 'title_thai', 255 );
            $table->string( 'description_thai', 255 );
            $table->text( 'content_thai' );
        } );
    }
}
