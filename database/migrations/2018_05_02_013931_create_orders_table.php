<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('orders');
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
           // $table->foreign('user_id')->references('id')->on('users');
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
