<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/*
|--------------------------------------------------------------------------
| 用户拥有的优惠券表
|--------------------------------------------------------------------------
|
| 优惠券类型：discount：折扣，对应value字段记录折扣，如0.9表示九折
|           cash：代金券，对应value记录抵扣现金，如39.50表示可以抵扣39.50元
| 未使用优惠券order_id字段为空
*/

class CreateUserCouponsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_coupons', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->comment('用户ID');
            $table->integer('coupon_id')->unsigned()->comment('优惠券ID');
            $table->integer('order_id')->unsigned()->nullable()->comment('订单ID');
            $table->timestamps();

            $table->index('user_id');
            $table->index('coupon_id');
        //    $table->foreign('user_id')->references('id')->on('users');
        //    $table->foreign('coupon_id')->references('id')->on('coupons');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_coupons');
    }
}
