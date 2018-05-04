<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('payments');
        Schema::create('payments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->comment('用户ID');
            $table->integer('order_id')->unsigned()->comment('订单ID');
            $table->enum('type', ['balance'])->comment('支付类型');
            $table->float('amount', 8, 2)->unsigned()->comment('支付金额');
            $table->timestamps();
            $table->index('user_id');
            // $table->foreign('user_id')->references('id')->on('users');
            // $table->foreign('order_id')->references('id')->on('orders');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payments');
    }
}
