<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/*
|--------------------------------------------------------------------------
| 订单表
|--------------------------------------------------------------------------
|
| items字段以数组形式存储订单包含的各个单品的信息（包括单品信息、购买数量、优惠、总价等）
| 订单中单品的信息不再改变（即使单品表修改了单品信息也改变）。
| 订单中address信息存储收获地址，一旦存储不再改变。
| 订单中invoice信息一旦存储，不再改变。
*/

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->comment('用户ID');
            $table->float('total_amount', 10, 2)->unsigned()->comment('货品总金额');
            $table->float('discount', 10, 2)->unsigned()->comment('折扣');
            $table->float('freight', 10, 2)->unsigned()->comment('运费');
            $table->float('payment', 10, 2)->unsigned()->comment('实际付款总额');
            $table->json('items')->comment('订单所有单品详情，数组');
            $table->json('address')->comment('收货人信息');
            $table->json('invoice')->comment('发票信息');
            $table->timestamps();

            $table->index('user_id');
         //   $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
