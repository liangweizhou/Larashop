<?php

use Illuminate\Database\Seeder;

class CartsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       DB::table('carts')->insert([
           [
               'user_id' => 1,
               'item_id' => 1,
               'amount' => 2
           ],
           [
               'user_id' => 2,
               'item_id' => 3,
               'amount' => 1
           ]
       ]);
    }
}
