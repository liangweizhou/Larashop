<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCouponsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('coupons');
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
