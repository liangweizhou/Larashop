<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/*
|--------------------------------------------------------------------------
| 商品表
|--------------------------------------------------------------------------
| 注意区分商品和单品，商品相当于类而单品相当于使用不同属性实例化的对象。
|
| spu为categories表spu_conf实例，例如：
| {'brand': '华为', 'os': ['Android', 'WindowsPhone']}
|
*/

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->comment('商品名称，如荣耀8');
            $table->integer('category_id')->unsinged()->comment('直接品类ID');
            $table->json('category_ids')->comment('品类ID，json数组，多层次category ID，包含所有层次的父类ID及直接ID');
            $table->json('spu')->comment('商品spu');
            $table->longText('description')->comment('商品描述，富文本');
            $table->timestamps();

            $table->index('category_id');
            //$table->foreign('category_id')->references('id')->on('categories');
        });

        //Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
