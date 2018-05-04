<?php

use Illuminate\Database\Seeder;

class ItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('items')->insert([
           [
            'id' => 1,
            'name' => '小米4 全网通 高配版 3GB+32GB 白色 移动联通电信4G手机 双卡双待',
            'products_id' => 1,
            'category_id' => 1,
            'category_ids' => '[1,0]',
            'spu' => '{"brand": "小米", "os": "Android"}',
            'sku' => '{"ram_size": 3, "disk_size": 32, "cpu_cores": "四核", "screen_size": 4.7, "battery_capacity": 3200, "network_mode": "全网通", "color": "白色"}',
            'price' => 1000.00,
            'total_amount' => 6000,
            'remaining_amount' => 1000,
            'cover_img' => 'https://img13.360buyimg.com/n7/jfs/t6400/251/1498502133/126650/2ade0e70/5951fa4aN6c972662.jpg',
            'imgs' => '["https://img13.360buyimg.com/n5/s54x54_jfs/t6400/251/1498502133/126650/2ade0e70/5951fa4aN6c972662.jpg","https://img13.360buyimg.com/n5/s54x54_jfs/t4162/347/1120270240/106175/48a65bf0/58bd4da6Nba6d5531.jpg","https://img13.360buyimg.com/n5/s54x54_jfs/t4309/280/1738455934/126650/2ade0e70/58c6394eN6cdc344a.jpg"]',
           ],
            [
                'id' => 2,
                'name' => '小米3 电信4G 高配版 6GB+64GB 黑色 电信4G手机',
                'products_id' => 6,
                'category_id' => 1,
                'category_ids' => '[1,0]',
                'spu' => '{"brand": "小米", "os": "Android"}',
                'sku' => '{"ram_size": 6, "disk_size": 64, "cpu_cores": "四核", "screen_size": 5.1, "battery_capacity": 3200, "network_mode": "电信4G", "color": "黑色"}',
                'price' => 1999.00,
                'total_amount' => 999,
                'remaining_amount' => 99,
                'cover_img' => 'https://img13.360buyimg.com/n7/jfs/t6400/251/1498502133/126650/2ade0e70/5951fa4aN6c972662.jpg',
                'imgs' => '["https://img13.360buyimg.com/n5/s54x54_jfs/t6400/251/1498502133/126650/2ade0e70/5951fa4aN6c972662.jpg","https://img13.360buyimg.com/n5/s54x54_jfs/t4162/347/1120270240/106175/48a65bf0/58bd4da6Nba6d5531.jpg","https://img13.360buyimg.com/n5/s54x54_jfs/t4309/280/1738455934/126650/2ade0e70/58c6394eN6cdc344a.jpg"]',
            ],
            [
                'id' => 3,
                'name' => '联想ThinkPadE540 15.6英寸轻薄窄边框笔记本电脑（i5-8250U 8G 128GSSD+500G 2G独显 FHD）冰原银',
                'products_id' => 2,
                'category_id' => 2,
                'category_ids' => '[2,0]',
                'spu' => '{"brand": "ThinkPad", "os": "Windows"}',
                'sku' => '{"ram_size": 8, "disk_size": 500, "cpu_cores": "四核", "screen_size": 15.6, "cpu": "i5", "graphics": "GTX 1080Ti"}',
                'price' => 5999.00,
                'total_amount' => 300,
                'remaining_amount' => 100,
                'cover_img' => 'https://img12.360buyimg.com/n5/s54x54_jfs/t14920/22/1777379314/198740/95d0cc64/5a582c82N56109a34.jpg',
                'imgs' => '["https://img12.360buyimg.com/n5/s54x54_jfs/t18346/115/11860704/181729/a6fb5046/5a578aeaN1e74c5b0.jpg","https://img12.360buyimg.com/n5/s54x54_jfs/t17428/351/1741555204/190464/d69fe9a2/5ad56a25Naf0cbb7c.jpg","https://img12.360buyimg.com/n5/s54x54_jfs/t19003/133/11473160/310101/f7aae183/5a578aebNd738cbc6.jpg"]',
            ],
        ]);
    }
}
