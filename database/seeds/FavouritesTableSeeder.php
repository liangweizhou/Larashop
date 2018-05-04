<?php

use Illuminate\Database\Seeder;

class FavouritesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('favourites')->insert([
            [
                'user_id' => 1,
                'item_id' => 1,
            ],
            [
                'user_id' => 1,
                'item_id' => 2,
            ],
            [
                'user_id' => 1,
                'item_id' => 3,
            ],
            [
                'user_id' => 2,
                'item_id' => 1,
            ],
            [
                'user_id' => 2,
                'item_id' => 3,
            ],
            [
                'user_id' => 1,
                'item_id' => 3,
            ],
        ]);
    }
}
