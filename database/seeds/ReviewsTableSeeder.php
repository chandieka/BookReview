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
        while($counter <= 10){
            DB::table('reviews')->insert([
                [
                    'title' => 'Review '.$counter,
                    'rating' => 7.5,
                    'content' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Eum quidem rem quaerat sit ratione veniam aut aspernatur. Culpa, nisi? Voluptatem modi corrupti unde a quod similique perferendis suscipit reprehenderit eligendi.'
                ],
            ]);
            $counter++;
        }
    }
}
