<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('user_comments');
        Schema::create('user_comments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->comment('用户ID');
            $table->integer('product_id')->unsigned()->comment('商品ID');
            $table->json('item_sku')->comment('用户购买的单品SKU信息');
            $table->integer('rate')->unsigned()->comment('评分，1-5的整数');
            $table->text('detail')->comment('评论详情');
            $table->json('pics')->comment('评论图片，数组');
            $table->timestamps();

            $table->index('user_id');
            $table->index('product_id');
         //   $table->foreign('user_id')->references('id')->on('users');
         //   $table->foreign('product_id')->references('id')->on('products');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_comments');
    }
}
