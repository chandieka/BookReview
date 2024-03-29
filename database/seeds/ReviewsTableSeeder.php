<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReviewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $counter = 1;
        while($counter <= 20){
            DB::table('reviews')->insert([
                [
                    'title' => 'Review '.$counter,
                    'user_id' => 1,
                    'book_id' => $counter,
                    'rating' => 8,
                    'content' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Eum quidem rem quaerat sit ratione veniam aut aspernatur. Culpa, nisi? Voluptatem modi corrupti unde a quod similique perferendis suscipit reprehenderit eligendi.',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
            ]);
            $counter++;
        }
    }
}
