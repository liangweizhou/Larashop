<?php

use Illuminate\Database\Seeder;

class PaymentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('payments')->insert([
            [
                'user_id' => 1,
                'order_id' => 1,
                'type' => 'balance',
                'amount' => 2000,
            ],

        ]);
    }
}
