<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFavouritesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('favourites');
        Schema::create('favourites', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->unique()->comment('用户ID');
            $table->integer('item_id')->unsigned()->unique()->comment('单品ID');
            $table->timestamps();

            $table->index('user_id');
          //  $table->foreign('user_id')->references('id')->on('users');
            //$table->foreign('item_id')->references('id')->on('items');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('favourites');
    }
}
