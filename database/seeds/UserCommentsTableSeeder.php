<?php

use Illuminate\Database\Seeder;

class UserCommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('UserComments')->insert([
           [
               'user_id' => 1,
               'product_id' => 1,
               'item_sku' => '["ram_size": "3", "disk_size": "32"]',
               'rate' => 4,
               'detail' => '3月15日支付尾款，16号京东就送到货了。最近10年一直使用苹果，第一次买安卓系统高端手机，之前公司发过一个低端千元安卓手机，刚用就卡的不行，
               所以没敢尝试。此次购买也是被苹果不出双卡双待和高价刘海X逼到三星来了。 使用一天发现现在的安卓系统很流畅了，三星还是比较厚道的，配齐了各种接口，还可以和苹果系统倒文件，
               包装内还有个质量尚可的手机套。另外有优惠换屏换电池的政策还有价值200的积分卡，需要先注册三星会员才能扫码申领，5天后还要二次确认，稍显复杂。没用刘海的全面大屏的确很爽，
               真机正面是市面上最好看的了，指纹锁在后面镜头下。bixby 声音比Siri 好听是真人声，辨别能力还不错，翻译文字的功能很不错，但是不能是大段的，最好是单词。手机音响效果可以，85分吧。凝时摄影是亮点，但是对光线要求较强。 
               最大的收获其实是三星手表Gear3, 比之前的Iwatch强太多了，的确像个手表了，App可以花钱和免费下载很多表盘，竟然还有陀飞轮，手表和手机连接简单方便。建议男士配这款手表。',
               'pics' =>'["https://img30.360buyimg.com/n0/s48x48_jfs/t19138/145/843215898/308430/ac9022f6/5aabdde9N6c99e928.jpg", "https://img30.360buyimg.com/n0/s48x48_jfs/t16468/27/2475963779/326034/996d440c/5aabddeaN683f1cb2.jpg", "https://img30.360buyimg.com/n0/s48x48_jfs/t19252/136/828014254/238430/96e2f7ad/5aabddeaNa7098740.jpg"]' ,
        ],
            [
                'user_id' => 1,
                'product_id' => 2,
                'item_sku' => '["ram_size": "6", "disk_size": "64"]',
                'rate' => 1,
                'detail' => '真的很差，不想再买，不在信任此品牌！！请看下图！',
                'pics' =>'["https://img30.360buyimg.com/n0/s48x48_jfs/t19504/271/810423904/64955/2fd5d559/5aa91a48N565c568a.jpg", "https://img30.360buyimg.com/n0/s48x48_jfs/t16078/18/2351592394/53306/debffcd8/5aa91a48N06b7249f.jpg", "https://img30.360buyimg.com/n0/s48x48_jfs/t16336/13/2403976090/63415/f1171cfd/5aa91a49N6c2d0f68.jpg"]',
            ],
        ]);
    }
}
