<?php

namespace App\Http\Controllers;

use App\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReviewController extends Controller
{
    public function index ()
    {
        // get all the reviews
        $reviews = \App\Review::all();

        // return view('review/index', compact('reviews'));
        return view('review/index', compact('reviews'));

    }

    // public function store($userId)
    // {
    //     // if fail Illuminate\Database\Eloquent\ModelNotFoundException will be thrown
    //     $user = \App\User::findOrfail($userId);
        
    //     $isSuccess = DB::insert('insert into users (id, name) values (_id, _name)', [
    //         '_id' => $user->id, 
    //         '_name' => $user->name
    //         ]);

    //     if ($isSuccess){
    //         return redirect('/reviews');
    //     }
    //     else {
    //         return redirect('/errors');
    //     }
    // }
}
