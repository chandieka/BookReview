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

        DB::table('users')->insert([
            [
                'name' => 'test',
                'email' => 'test@gmail.com',
                'password' => bcrypt('Testing1'),
            ],
        ]);
    }
}
