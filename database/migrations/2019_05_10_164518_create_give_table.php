<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGiveTable extends Migration
{
    const Table = 'give';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(self::Table, function (Blueprint $table) {
            $table->increments( 'id' );
            $table->unsignedInteger( 'fk_user_id' );
            $table->foreign( 'fk_user_id' )->references( 'id' )->on( 'users' );
            $table->unsignedInteger( 'fk_category_id' );
            $table->foreign( 'fk_category_id' )->references( 'id' )->on( 'give_category' );
            $table->enum( 'type', [ 'public', 'draft' ] );
            $table->string( 'title_thai', 255 );
            $table->string( 'title_english', 255 );
            $table->string( 'description_thai', 255 );
            $table->string( 'description_english', 255 );
            $table->integer( 'amount' );
            $table->text( 'address' );
            $table->integer( 'view' );
            $table->date( 'expired_date' );
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
