<?php

namespace App\Http\Controllers;

use App\Review;
use Illuminate\Http\Request;
use Illuminate\Auth;

class OverviewController extends Controller
{
    public function index()
    {
        $books=\App\Book::paginate(12);

        if(\Auth::check())
        {
            $user = auth()->user();
            return view('overviews/index',compact('books', 'user'));
        }
        else
        {
            return view('overviews/index',compact('books'));
        }
    }

    // return the view with all the reviews
    public function reviews()
    {
        $reviews = \App\Review::paginate(10);

        return view('overviews/reviews',compact('reviews'));
    }
}
