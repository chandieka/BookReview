<?php

use Illuminate\Database\Seeder;

class GenresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('genres')->insert([
            [
                'name' => 'Fantasy'
            ],
        ]);DB::table('genres')->insert([
            [
                'name' => 'Science fiction'
            ],
        ]);DB::table('genres')->insert([
            [
                'name' => 'Western'
            ],
        ]);DB::table('genres')->insert([
            [
                'name' => 'Romance'
            ],
        ]);DB::table('genres')->insert([
            [
                'name' => 'Thriller'
            ],
        ]);DB::table('genres')->insert([
            [
                'name' => 'Mystery'
            ],
        ]);DB::table('genres')->insert([
            [
                'name' => 'Detective'
            ],
        ]);DB::table('genres')->insert([
            [
                'name' => 'Dystopia'
            ],
        ]);DB::table('genres')->insert([
            [
                'name' => 'Newspaper'
            ],
        ]);DB::table('genres')->insert([
            [
                'name' => 'Horror'
            ],
        ]);DB::table('genres')->insert([
            [
                'name' => 'Biography'
            ],
        ]);
    }
}
