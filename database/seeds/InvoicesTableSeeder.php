<?php

use Illuminate\Database\Seeder;

class InvoicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('invoices')->insert([
            [
                'user_id' => 1 ,
                'org_name' => '东北师范大学出版社激光照排中心' ,
                'tax_id' => '91220101124023538J',
                'org_addr' => '南关区人民大街5268号',
                'org_tel' => '0431-84568018',
                'org_bank' => '吉林银行净月支行',
                'org_account' => '7412589631234564526'
,            ],
            [
                'user_id' => 1 ,
                'org_name' => '长春东北师大教育发展有限公司' ,
                'tax_id' => '91220101MA0Y49YB03',
                'org_addr' => '吉林省长春市南关区人民大街5268号东北师范大学师训大楼703-704室',
                'org_tel' => '15590097779',
                'org_bank' => '交通银行长春友谊支行',
                'org_account' => '221899991010003011142'
            ],
            [
                'user_id' => 1 ,
                'org_name' => '东北师范大学出版社激光照排中心' ,
                'tax_id' => '91220101124023538J',
                'org_addr' => '南关区人民大街5268号',
                'org_tel' => '0431-84568018',
                'org_bank' => '吉林银行',
                'org_account' => '7412589631234564'],
            [
                'user_id' => 1 ,
                'org_name' => '长春东北师范大学音像出版社有限责任公司' ,
                'tax_id' => '91220101743024169B',
                'org_addr' => '长春市南关区人民大街5268号',
                'org_tel' => '0431-84568095',
                'org_bank' => '工行吉林分行营业部自由大路支行',
                'org_account' => '4200221409200027513'
            ],
            [
                'user_id' => 2 ,
                'org_name' => '上海科大讯飞信息科技有限公司' ,
                'tax_id' => '91310115MA1H72FN1H',
                'org_addr' => '浦东新区南汇新城镇环湖西二路888号2幢1区3065室',
                'org_tel' => '021-60521373',
                'org_bank' => '中国建设银行股份有限公司上海临港新城支行',
                'org_account' => '31050181420000000026'
            ],
            [
                'user_id' => 2 ,
                'org_name' => '合肥科大讯飞教育发展有限公司' ,
                'tax_id' => '91340100680828345L',
                'org_addr' => '安徽省合肥市高新区天柱路3号501室',
                'org_tel' => '055165309174',
                'org_bank' => '交通银行合肥高新区支行',
                'org_account' => '341313000018150064035'
            ],

        ]);
    }
}
