<?php

namespace App\Http\Controllers;

use App\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReviewController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    }

    public function index ()
    {
        // get all the reviews
        $reviews = \App\Review::all();

        // return datas to the views
        return view('reviews/index', compact('reviews'));

    }

    public function create()
    {
        return view('reviews/create');

    }

    public function store(Request $request)
    {
        
    }

    public function show($review)
    {
        # code...
    }

    public function edit()
    {
        # code...
    }

    public function update()
    {
        # code...
    }

    public function delete()
    {

    }

}
