<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
           ['name' => 'zlw',
           'sex' => 'M',
           'birth_date' => '1995-04-29',
           'email' => 'zlw@gmail.com',
           'mobile' => '15043018812',
           'avatar' => 'https://p0.ssl.qhimg.com/t0137a3a9b9c7ad38e1.png',
           'balance' => 1000.11,
           'points' => 1000,
           'level' => 2,
           'password' => bcrypt('secret')] ,
            ['name' => '123',
                'sex' => 'F',
                'birth_date' => '1995-04-29',
                'email' =>  '123@gmail.com',
                'mobile' => '15043018813',
                'avatar '=> 'https://p0.ssl.qhimg.com/t0137a3a9b9c7ad38e1.png',
                'balance' => 1054.11,
                'points' => 1000,
                'level' => 2,
                'password' => bcrypt('secret')],
            [
                'name' => '12345',
                'sex' => 'M',
                'birth_date' => '1996-04-29',
                'email' => '12345@gmail.com',
                'mobile' => '15043018814',
                'avatar' => 'https://p0.ssl.qhimg.com/t0137a3a9b9c7ad38e1.png',
                'balance' => 4532.11,
                'points' => 1000,
                'level' => 2,
                'password' => bcrypt('secret')],
            ['name'=> 'zhoulw',
                'sex' => 'U',
                'birth_date' => '1995-04-27',
                'email' =>  'zhoulw@gmail.com',
                'mobile' => '15043018815',
                'avatar' => 'https://p0.ssl.qhimg.com/t0137a3a9b9c7ad38e1.png',
                'balance' => 1040.11,
                'points' => 10004,
                'level' => 3,
                'password' => bcrypt('secret')]

        ]);
    }
}
