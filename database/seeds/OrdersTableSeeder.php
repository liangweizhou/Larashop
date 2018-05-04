<?php

use Illuminate\Database\Seeder;

class OrdersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('orders')->insert([
            [
                'user_id' => 1,
                'total_amount' => 2000,
                'discount' => 100,
                'freight' => 100,
                'payment' => 2000,
                'items' => '["name" :"小米4 全网通 高配版 3GB+32GB 白色 移动联通电信4G手机 双卡双待", "imgs": "https://img13.360buyimg.com/n5/s54x54_jfs/t6400/251/1498502133/126650/2ade0e70/5951fa4aN6c972662.jpg"]',
                'address' => '["tag": "家", "consignee_name": "周良炜", "consignee_mobile": "15043018815", "province": "湖北省", "city": "襄阳市", "district": "宜城市", "detail": "宜城市邓城街道37号"]',
                'invoice' => '["org_name": "东北师范大学出版社激光照排中心", "tax_id": "91220101124023538J", "org_addr": "南关区人民大街5268号", "org_tel": "0431-84568018", "org_bank": "吉林银行净月支行", "org_account": "7412589631234564526"]',

            ]

        ]);
    }
}
