<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/*
|--------------------------------------------------------------------------
| 优惠券表
|--------------------------------------------------------------------------
|
| 本表相当于商品表，用户可以抢购，然后生成user_coupons表，
| 用户使用优惠券时更新user_coupons表
|
| 优惠券类型：discount：折扣，对应value字段记录折扣，如0.9表示九折
|           cash：代金券，对应value记录抵扣现金，如39.50表示可以抵扣39.50元
*/

class CreateCouponsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coupons', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->comment('优惠券名称');
            $table->enum('type', ['discount', 'cash'])->comment('优惠券类型');
            $table->float('value', 10, 2)->unsigned()->comment('优惠券值');
            $table->integer('total_amount')->unsigned()->comment('优惠券总量');
            $table->integer('remaining_amount')->unsigned()->comment('优惠券剩余量');
            $table->integer('category_id')->unsigned()->nullable()->comment('可用于的品类，空表示全品类');
            $table->integer('user_level')->unsigned()->default(1)->comment('等级大于该值的用户可以领取');
            $table->dateTime('expire_at')->comment('过期时间');
            $table->timestamps();

            $table->index('type');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('coupons');
    }
}
