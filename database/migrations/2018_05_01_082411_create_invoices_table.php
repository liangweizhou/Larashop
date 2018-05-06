<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->comment('用户ID');
            $table->string('org_name')->comment('单位名称');
            $table->string('tax_id')->comment('纳税人识别号（企业报销时必填）');
            $table->string('org_addr')->comment('单位地址');
            $table->string('org_tel')->comment('单位电话');
            $table->string('org_bank')->comment('开户银行');
            $table->string('org_account')->comment('银行账户');
            $table->timestamps();

            $table->index('user_id');
         //   $table->foreign('user_id')->references('id')->on('users');
        });

       // Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('invoices');
    }
}
