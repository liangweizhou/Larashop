<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('users');
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id')->comment('用户ID');
            $table->string('name');
            $table->enum('sex',['M','F','U'])->comment('用户性别，U为未知性别');
            $table->date('birth_date')->comment('出生日期');
            $table->string('email')->unique();
            $table->string('mobile', 11)->unique()->comment('手机号码');
            $table->text('avatar')->nullable()->comment('头像地址');
            $table->float('balance', 10, 2)->default(0)->unsigned()->comment('账户余额');
            $table->integer('points')->unsigned()->default(0)->comment('积分');
            $table->integer('level')->unsigned()->default(0)->comment('用户等级');
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
