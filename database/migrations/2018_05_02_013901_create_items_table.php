<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('items');
        Schema::create('items', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->comment('单品名称，如荣耀9 全网通 高配版 6GB+64GB 琥珀金 移动联通电信4G手机 双卡双待');
            $table->integer('product_id')->unsigned()->comment('商品ID');
            $table->integer('category_id')->comment('直接品类ID');
            $table->json('category_ids')->comment('品类ID，json数组，多层次category ID，包含所有层次的父类ID及直接ID');
            $table->json('spu')->comment('商品spu');
            $table->json('sku')->comment('单品sku');
            $table->float('price', 10, 2)->unsigned()->comment('单价');
            $table->integer('total_amount')->unsigned()->comment('总库存');
            $table->integer('remaining_amount')->unsigned()->comment('剩余库存');
            $table->string('cover_img')->comment('封面图片');
            $table->json('imgs')->comment('所有图片');
            $table->timestamps();

           // $table->foreign('product_id')->references('id')->on('products');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('items');
    }
}
