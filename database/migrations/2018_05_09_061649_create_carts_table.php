<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/*
|--------------------------------------------------------------------------
| 购物车表
|--------------------------------------------------------------------------
|
|
|
*/

class CreateCartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carts', function (Blueprint $table) {
            $table->increments('id');
//            $table->integer('user_id')->unsigned()->unique()->comment('用户ID');
//            $table->integer('item_id')->unsigned()->unique()->comment('单品ID');
            $table->integer('user_id')->unsigned()->comment('用户ID');
            $table->integer('item_id')->unsigned()->comment('单品ID');
            $table->integer('amount')->unsigned()->commnet('数量');
            $table->timestamps();

            $table->index('user_id');
            $table->index(['user_id', 'item_id']);
            $table->unique(['user_id', 'item_id']);
            //  $table->foreign('user_id')->references('id')->on('users');
            //  $table->foreign('item_id')->references('id')->on('items');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('carts');
    }
}
