<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLearnCategoryTable extends Migration
{
    const Table = 'learn_category';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(self::Table, function (Blueprint $table) {
            $table->increments( 'id' );
            $table->string( 'title_thai', 255 );
            $table->string( 'title_english', 255 );
            $table->timestamp( 'updated_at' );
            $table->timestamp( 'created_at' )->useCurrent();
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
