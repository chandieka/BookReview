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

    public function create()
    {
<<<<<<< Updated upstream
        return view('review/create');
=======

    }

    public function store(Request $request)
    {
    
>>>>>>> Stashed changes
    }
}
