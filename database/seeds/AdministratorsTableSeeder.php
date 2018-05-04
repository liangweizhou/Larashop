<?php

use Illuminate\Database\Seeder;

class AdministratorsTableSeeder extends Seeder
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
              'name' => '高飞',
              'email' => 'gaofei@qq.com',
              'password' => bcrypt('123456')
          ],
            [
                'name' => '王一飞',
                'email' => 'wyf@qq.com',
                'password' => bcrypt('123456')
            ],
            [
                'name' => '赵飞',
                'email' => 'zhaofei@qq.com',
                'password' => bcrypt('123456')
            ],
            [
                'name' => '费飞',
                'email' => 'feifei@qq.com',
                'password' => bcrypt('123456')
            ],
        ]);
    }
}
