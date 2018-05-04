<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('addresses');
        Schema::create('addresses', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->comment('用户ID');
            $table->string('tag')->comment('地址标签，如家、公司等');
            $table->tinyInteger('is_default')->unsigned()->default(0)->comment('是否默认收获地址');
            $table->string('consignee_name')->comment('收货人姓名');
            $table->string('consignee_mobile', 11)->comment('收货人手机号码');
            $table->string('province')->comment('省');
            $table->string('city')->comment('市');
            $table->string('district')->comment('区县');
            $table->string('detail')->comment('详细地址');
            $table->timestamps();

            $table->index('user_id');
            //$table->foreign('user_id')->references('id')->on('users');
        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('addresses');
    }
}
