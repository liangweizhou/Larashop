<?php

use Illuminate\Database\Seeder;

class AddressesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('addresses')->insert([
            [
                'user_id' => 1,
                'tag' => '家',
                'is_default' => 1,
                'consignee_name' => '周良炜',
                'consignee_mobile' => '15043018815',
                'province' => '湖北省',
                'city' => '襄阳市',
                'district' => '宜城市',
                'detail' => '宜城市邓城街道37号'
            ],
            [
                'user_id' => 1,
                'tag' => '家',
                'is_default' => 0,
                'consignee_name' => '李富贵',
                'consignee_mobile '=> '15043018811',
                'province' => '安徽省',
                'city' => '合肥市',
                'district' => '庐阳区',
                'detail' => '庐阳区公安厅'
            ],
            [
                'user_id' => 2,
                'tag' => '家',
                'is_default' => 1,
                'consignee_name' => '张天爱',
                'consignee_mobile' => '15043018812',
                'province' => '湖北省',
                'city' => '襄阳市',
                'district' => '宜城市',
                'detail' => '宜城市郾城卫生室'],
            [
                'user_id' => 2,
                'tag' => '家',
                'is_default' => 0,
                'consignee_name' => '袁天罡',
                'consignee_mobile' => '15043018814',
                'province' => '广东省',
                'city' => '深圳市',
                'district' => '福田区',
                'detail' => '福田区岗厦力天大厦29号']
        ]);
    }
}
