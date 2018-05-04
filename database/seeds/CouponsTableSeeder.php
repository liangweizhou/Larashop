<?php

use Illuminate\Database\Seeder;

class CouponsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table()->insert([
            [
                'name' => '小米手机五一劳动节优惠券全场手机通用',
                'type' => 'cash',
                'value' => 100,
                'total_amount' => 200,
                'remaining_amount' => 100,
                'category_id' => 1,
                'user_level' => 2,
                'expire_at' => '2018-06-03 00:00:00',
            ],
            [
                'name' => '小米电脑五一劳动节优惠券全场电脑通用',
                'type' => 'cash',
                'value' => 50,
                'total_amount' => 200,
                'remaining_amount' => 100,
                'category_id' => 2,
                'user_level' => 3,
                'expire_at' => '2018-06-03 00:00:00',
            ],
            [
                'name' => '联想电脑优惠券',
                'type' => 'cash',
                'value' => 100,
                'total_amount' => 200,
                'remaining_amount' => 100,
                'category_id' => 2,
                'user_level' => 3,
                'expire_at' => '2018-06-03 00:00:00',
            ],
        ]);
    }
}
