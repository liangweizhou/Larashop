<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            [
                'id' => 1,
                'name' => '小米4',
                'category_id' => 1,
                'category_ids' => '[1,0]',
                'spu' => '{"brand": "小米", "os": "Android"}',
                'description' => '暂无描述',
            ],
            [
                'id' => 2,
                'name' => 'ThinkPadE540',
                'category_id' => 2,
                'category_ids' => '[2,0]',
                'spu' => '{"brand": "ThinkPad", "os": "Windows"}',
                'description' => '暂无描述',
            ],
            [
                'id' => 3,
                'name' => '苹果8p',
                'category_id' => 1,
                'category_ids' => '[1,0]',
                'spu' => '{"brand": "苹果", "os": "IOS"}',
                'description' => '暂无描述',
            ],
            [
                'id' => 4,
                'name' => '小米note',
                'category_id' => 1,
                'category_ids' => '[1,0]',
                'spu' => '{"brand": "小米", "os": "Android"}',
                'description' => '暂无描述',
            ],
            [
                'id' => 5,
                'name' => '华硕电脑',
                'category_id' => 2,
                'category_ids' => '[2,0]',
                'spu' => '{"brand": "华硕", "os": "Windows"}',
                'description' => '暂无描述',
            ],
            [
                'id' => 6,
                'name' => '小米3',
                'category_id' => 2,
                'category_ids' => '[1,0]',
                'spu' => '{"brand": "小米", "os": "Android"}',
                'description' => '暂无描述',
            ],
            [
                'id' => 7,
                'name' => 'ThinkpadE440',
                'category_id' => 2,
                'category_ids' => '[2,0]',
                'spu' => '{"brand": "ThinkPad", "os": "Windows"}',
                'description' => '暂无描述',
            ],
            [
                'id' => 8,
                'name' => 'ThinkPadZ50',
                'category_id' => 2,
                'category_ids' => '[2,0]',
                'spu' => '{"brand": "ThinkPad", "os": "Windows"}',
                'description' => '暂无描述',
            ],
        ]);
    }
}
