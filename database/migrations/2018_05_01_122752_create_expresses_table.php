<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/*
|--------------------------------------------------------------------------
| 快递信息表
|--------------------------------------------------------------------------
|
| 快递详情通过相关API请求获得，整体更新
*/

class CreateExpressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expresses', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('order_id')->unsigned()->unique()->comment('订单ID');
            $table->string('no')->comment('快递单号');
            $table->string('company')->comment('快递公司名称');
            $table->json('detail')->comment('快递详情');
            $table->timestamps();

            $table->index('order_id');
          //  $table->foreign('order_id')->references('id')->on('orders');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('expresses');
    }
}
