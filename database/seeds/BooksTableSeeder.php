<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $counter = 1;
        $date = '1999-01-21';
        while($counter <= 20){
            DB::table('books')->insert([
                [
                    'title' => 'Book No. '.$counter,
                    'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Eum quidem rem quaerat sit ratione veniam aut aspernatur. Culpa, nisi? Voluptatem modi corrupti unde a quod similique perferendis suscipit reprehenderit eligendi.',
                    'date' => $date,
                    'author' => 'Author No.'.$counter
                ],
            ]);
            $repeat = strtotime("+1 year",strtotime($date));
            $date = date('Y-m-d',$repeat);
            $counter++;
        }
    }
}
