<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('admin123'),
                'isAdmin' => 1,
            ],
        ]);
        $counter = 1;
        while ($counter <= 20) {
            DB::table('users')->insert([
                [
                    'name' => 'test '.$counter,
                    'email' => 'test'.$counter.'@gmail.com',
                    'password' => bcrypt('Testing1'),
                ],
            ]);
            $counter++;
        }

        DB::table('users')->insert([
            [
                'name' => 'kimsis',
                'email' => 'mimaqm@gmail.com',
                'password' => bcrypt('123456'),
            ],
        ]);
    }
}
