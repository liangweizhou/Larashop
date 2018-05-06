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
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->enum('sex', ['M', 'F', 'U'])->comment('性别，U为未知');
            $table->date('birth_date')->comment('出生日期');
            $table->string('email')->unique();
            $table->string('mobile', 11)->unique()->comment('手机号码');
            $table->text('avatar')->comment('头像地址');
            $table->string('password');
            $table->float('balance', 10, 2)->unsigned()->default(0)->comment('账户余额');
            $table->integer('points')->unsigned()->default(0)->comment('积分');
            $table->integer('level')->unsigned()->default(1)->comment('用户等级');
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
