<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            [
              'id' => 1,
              'parent_id' =>0 ,
              'name' => '手机',
              'level' => 1,
              'spu_config' => '{\'brand\': {\'name\': \'品牌\', \'type\': \'enum\',\'options\': [\'华为\', \'小米\', \'苹果\', \'其他\'], \'multiple_options\': false, \'disabled\': false},\'os\': {\'name\': \'操作系统\', \'type\': \'enum\', \'options\': [\'Android\',\'iOS\', \'WindowsPhone\', \'其他\'],\'multiple_options\': true, \'disabled\': false}}',
              'sku_config' => '{\'ram_size\': {\'name\': \'运行内存\', \'type\': \'intrange\', \'unit\': \'GB\', \'min\': 1, \'max\': 12, \'disabled\': false},\'disk_size\': {\'name\': \'机身内存\', \'type\': \'intrange\', \'unit\': \'GB\', \'min\': 8, \'max\': 1024, \'disabled\': false},\'cpu_cores\': {\'name\': \'CPU核数\', \'type\': \'enum\', \'options\': [\'单核\', \'双核\', \'四核\', \'八核\', \'十核\', \'其他\'], \'multiple_options\': false, \'disabled\': false},\'screen_size\': {\'name\': \'屏幕尺寸\', \'type\': \'floatrange\', \'unit\': \'英寸\', \'min\': 2.4, \'max\': 10.1, \'disabled\': false},\'battery_capacity\': {\'name\': \'电池容量\', \'type\': \'intrange\', \'unit\': \'mAh\', \'min\': 1000, \'max\': 100000, \'disabled\': false},\'network_mode\': {\'name\': \'网络\', \'type\': \'enum\', \'options\': [\'移动4G\', \'电信4G\', \'联通4G\', \'全网通\'], \'multiple_options\': true, \'disabled\': false, \'color\': {\'name\': \'颜色\', \'type\': \'enum\', \'options\' :[\'黑色\',\'白色\',\'黄色\',\'蓝色\',\'灰色\'], \'disabled\': false},}}',
            ],
            [
                'id' => 2,
                'parent_id' => 0 ,
                'name' => '电脑',
                'level' => 1,
                'spu_conf' => '{\'brand\': {\'name\': \'品牌\', \'type\': \'enum\', \'options\': [\'联想\', \'thinkPad\',  \'小米\', \'苹果\', \'华硕\',\'其他\'], \'multiple_options\': false, \'disabled\': false}, \'os\': {\'name\': \'操作系统\', \'type\': \'enum\', \'options\': [\'MAC\', \'windows\', \'Linux\', \'其他\'], \'multiple_options\': false, \'disabled\': false}, \'type\': {\'name\': \'电脑类型\', \'type\': \'enum\', \'options\': [\'游戏本\',\'服务主机\',\'轻薄本\',\'一体机\'], \'multiple_options\': false, \'disabled\': false}}',
                'sku_conf' => '{\'ram_size\': {\'name\': \'运行内存\', \'type\': \'intrange\', \'unit\': \'GB\', \'min\': 4, \'max\': 32, \'disabled\': false}, \'disk_size\': {\'name\': \'机身内存\', \'type\': \'intrange\', \'unit\': \'GB\', \'min\': 8, \'max\': 2048, \'disabled\': false},\'cpu\': {\'name\': \'CPU类型\', \'type\': \'enum\', \'options\': [\'i3\', \'i5\', \'i7\', \'赛扬\', \'奔腾\', \'AMD\'], \'multiple_options\': false, \'disabled\': false},\'screen_size\': {\'name\': \'屏幕尺寸\', \'type\': \'floatrange\', \'unit\': \'英寸\', \'min\': 7.9, \'max\': 25.6, \'disabled\': false},\'graphics\': {\'name\': \'显卡\', \'type\': \'enum\', \'options\': [\'GTX 1080Ti\',\'GTX1080\',\'RX Vega\',\'GTX 960\'], \'disabled\': false}'
            ]
        ]);
    }
}
