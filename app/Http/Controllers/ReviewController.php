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

    public function requestValidate(Request $request)
    {
        return $request->validate([
            'title' => 'required',
            'rating' => 'required',
            'content' => 'required',
        ]);
    }

    public function index ()
    {
        // get all the reviews
        $reviews = \App\Review::paginate(4);

        // dd($reviews);
        // return datas to the views
        
        return view('reviews/index', compact('reviews'));
    }

    public function create()
    {
        // go to the create review
        return view('reviews/create');
    }

    public function store(Request $request)
    {
        // validate the datas
        $review = $this->requestValidate($request);

        // create the review
        \App\Review::create($review);

        return redirect('reviews');
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
