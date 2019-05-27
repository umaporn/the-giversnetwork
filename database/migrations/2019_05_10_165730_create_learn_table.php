<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLearnTable extends Migration
{
    const Table = 'learn';
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(self::Table, function (Blueprint $table) {
            $table->increments( 'id' );
            $table->unsignedInteger( 'fk_category_id' );
            $table->foreign( 'fk_category_id' )->references( 'id' )->on( 'learn_category' );
            $table->string( 'title_thai', 255 );
            $table->string( 'title_english', 255 );
            $table->string( 'content_thai', 255 );
            $table->string( 'content_english', 255 );
            $table->string( 'file_path', 255 );
            $table->integer( 'view' );
            $table->enum( 'status', [ 'public', 'draft' ] );
            $table->enum( 'highlight_status', [ 'pinned', 'unpinned' ] );
            $table->string( 'type' );
            $table->date( 'public_date' );
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
