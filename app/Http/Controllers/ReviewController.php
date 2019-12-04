<?php

namespace App\Http\Controllers;

use App\Review;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;

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

    public function edit($id)
    {
        $review = \App\Review::findOrFail($id);

        return view('/reviews/edit', compact('review'));
    }

    public function update($id)
    {
        $review = \App\Review::findOrFail($id);

        $data = request()->validate([
            'title' => 'required',
            'rating' => 'required',
            'content' => 'required',
        ]);

        $review->update($data);

        return redirect('/reviews');
    }

    public function destroy($id)
    {
        $review = \App\Review::findOrFail($id);

        $review->delete();

        return redirect('/reviews');
    }
}
