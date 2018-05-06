<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
/*
|--------------------------------------------------------------------------
| 商品产品类目表
|--------------------------------------------------------------------------
|
| 商品类目提供各类商品类目名称及共有属性相关配置信息。
| 新建商品时根据商品类目表提供的属性信息（SPU）作为模板生成。
| 单品根据商品信息（SPU和SKU组合）生成，其中SPU在生成的时候不能修改必须和商品保持一致。
| 单品是可以按照属性（SPU和SKU来搜索的）。
| 限定最多三层，即新建类目的时候如果父类level>=3则不可以新建。
| spu_conf配置示例：
| {'brand': {'name': '品牌', 'type': 'enum', 'options': ['华为', '小米', '苹果', '其他'], 'multiple_options': false, 'disabled': false},
|  'os': {'name': '操作系统', 'type': 'enum', 'options': ['Android', 'iOS', 'WindowsPhone', '其他'], 'multiple_options': true, 'disabled': false}}
|
| sku_conf配置实例：
| {'ram_size': {'name': '运行内存', 'type': 'intrange', 'unit': 'GB', 'min': 1, 'max': 12, 'disabled': false},
|  'disk_size': {'name': '机身内存', 'type': 'intrange', 'unit': 'GB', 'min': 8, 'max': 1024, 'disabled': false},
|  'cpu_cores': {'name': 'CPU核数', 'type': 'enum', 'options': ['单核', '双核', '四核', '八核', '十核', '其他'], 'multiple_options': false, 'disabled': false},
|  'screen_size': {'name': '屏幕尺寸', 'type': 'floatrange', 'unit': '英寸', 'min': 2.4, 'max': 10.1, 'disabled': false},
|  'battery_capacity': {'name': '电池容量', 'type': 'intrange', 'unit': 'mAh', 'min': 1000, 'max': 100000, 'disabled': false},
|  'network_mode': {'name': '网络', 'type': 'enum', 'options': ['移动4G', '电信4G', '联通4G'], 'multiple_options': true, 'disabled': false}}
*/

//spu电脑
//{'brand': {'name': '品牌', 'type': 'enum', 'options': ['联想', 'thinkpad', '苹果', '华硕','其他'], 'multiple_options': false, 'disabled': false},
//  'os': {'name': '操作系统', 'type': 'enum', 'options': ['MAC', 'windows', 'Linux', '其他'], 'multiple_options': true, 'disabled': false},
// 'type':{'name':'电脑类型','type':'enum', 'options':['游戏本','服务主机','轻薄本','一体机'],'multiple_options': false, 'disabled': false}}
//sku电脑
//{'ram_size': {'name': '运行内存', 'type': 'intrange', 'unit': 'GB', 'min': 4, 'max': 32, 'disabled': false},
 // 'disk_size': {'name': '机身内存', 'type': 'intrange', 'unit': 'GB', 'min': 8, 'max': 2048, 'disabled': false},
 // 'cpu': {'name': 'CPU类型', 'type': 'enum', 'options': ['i3', 'i5', 'i7', '赛扬', '奔腾', 'AMD'], 'multiple_options': false, 'disabled': false},
 // 'screen_size': {'name': '屏幕尺寸', 'type': 'floatrange', 'unit': '英寸', 'min': 7.9, 'max': 25.6, 'disabled': false},
 // 'graphics': {'name': '显卡', 'type': 'enum', 'options': ['GTX 1080Ti','GTX1080','RX Vega','GTX 960'], 'disabled': false}





class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('categories');
        Schema::create('categories', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('parent_id')->unsigned()->nullable()->comment('父类ID');
            $table->json('parent_ids')->nullable()->comment('所有父类ID');
            $table->string('name')->unique()->comment('类目名称，如手机');
            $table->tinyInteger('level')->unsigned()->default(1)->comment('类目层级');
            $table->json('spu_conf')->nullable()->comment('可用SPU配置信息');
            $table->json('sku_conf')->nullable()->comment('可用SKU配置信息');
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
        Schema::dropIfExists('categories');
    }
}
