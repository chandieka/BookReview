<?php

namespace App\Http\Controllers;

use App\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function index ()
    {
        $reviews = \App\Review::all();

        // return view('review/index', compact('reviews'));
        return view('review/index', compact('reviews'));

    }
}
