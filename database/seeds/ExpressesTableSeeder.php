<?php

use Illuminate\Database\Seeder;

class ExpressesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('expresses')->insert([
            [
                'order_id' => 1,
                'no' => '466852139',
                'company' => '顺丰速递',
               'detail' => '{"name": "小米4 全网通 高配版 3GB+32GB 白色 移动联通电信4G手机 双卡双待", "tag": "家", "consignee_name": "周良炜", "consignee_mobile": "15043018815", "province": "湖北省", "city": "襄阳市", "district": "宜城市", "detail": "宜城市邓城街道37号"}'
            ],
            [
                'order_id' => 2,
                'no' => '4765123698',
                'company' => '圆通速递',
                'detail' => '{"name": "小米4 全网通 高配版 3GB+32GB 白色 移动联通电信4G手机 双卡双待", "tag": "家", "consignee_name": "周良炜", "consignee_mobile": "15043018815", "province": "湖北省", "city": "襄阳市", "district": "宜城市", "detail": "宜城市邓城街道37号"}'
             ]
//            ],
//            [
//                'order_id' => 3,
//                'no' => '594263834',
//                'company' => '韵达速递',
//                'detail' =>'[]',
//
//            ],

        ]);
    }
}
