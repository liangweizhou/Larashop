<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(AddressesTableSeeder::class);
        $this->call(CartsTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(CouponsTableSeeder::class);
        $this->call(ExpressesTableSeeder::class);
        $this->call(FavouritesTableSeeder::class);
        $this->call(InvoicesTableSeeder::class);
        $this->call(ItemsTableSeeder::class);
        $this->call(OrdersTableSeeder::class);
        $this->call(PaymentsTableSeeder::class);
        $this->call(UserCommentsTableSeeder::class);


    }
}
