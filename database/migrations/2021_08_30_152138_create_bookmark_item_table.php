<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookmarkItemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookmark_items', function (Blueprint $table) {
            $table->id();
            $table->integer('bookmark_item_id')->unsigned();
            $table->string('bookmark_item_type');
            $table->unsignedBigInteger('bookmarks_id');
            $table->foreign('bookmarks_id')->references('id')->on('bookmarks');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bookmark_items');
    }
}
