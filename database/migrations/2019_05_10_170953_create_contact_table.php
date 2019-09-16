<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactTable extends Migration
{
    const Table = 'contact';
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(self::Table, function (Blueprint $table) {
            $table->increments( 'id' );
            $table->string( 'fullName', 255 );
            $table->string( 'email', 254 )->unique();
            $table->string( 'mobile', 15 );
            $table->text( 'message' );
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
