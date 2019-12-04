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

    // function for returning a validate request
    public function requestValidate(Request $request)
    {
        return $request->validate([
            'title' => 'required',
            'rating' => 'required',
            'content' => 'required',
        ]);
    }

    // rendered all the reviews
    public function index ()
    {
        // get all the reviews from the auth user
        $authUser = auth()->user();
        $reviews = \App\Review::where('user_id', $authUser->id)->paginate(4);

        // return datas to the views
        return view('reviews/index', compact('reviews'));
    }

    // rendered the create page
    public function create()
    {
        // go to the create review
        return view('reviews/create');
    }

    // handle the logic for creation of reviews
    public function store(Request $request)
    {
        // validate the datas
        $review = $this->requestValidate($request);

        // create the review
        $data = \App\Review::create($review);
        // assigned the review to the auth user
        $data->user_id = auth()->user()->id;
        $data->save();

        // redirect to all views
        return redirect('reviews/');
    }

    // rendered one reviews
    public function show($review)
    {
        # code...
    }

    public function edit($review)
    {
        return $review;
    }

    public function update()
    {
        # code...
    }

    public function delete()
    {

    }

}
