<?php

namespace App\Http\Controllers;

use App\Review;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Gate;

class ReviewController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    }

    // function for returning a validate request
    public function requestValidate()
    {
        return request()->validate([
            'title' => 'required|min:5',
            'rating' => 'required|digits_between:0,10',
            'content' => 'required|min:20',
            'book_id' => 'required',
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
    public function create($id)
    {
        $book = \App\Book::findOrFail($id);
        // go to the create review
        return view('reviews/create', compact('book'));
    }

    // handle the logic for creation of reviews
    public function store()
    {
        // validate the datas
        $review = $this->requestValidate();

        // create the review
        $data = \App\Review::create($review);

        // assigned the review to the auth user
        $data->user_id = auth()->user()->id;
        $data->book_id = request()->book_id;
        $data->save();

        // redirect
        return redirect('/books/'.request()->book_id)->with('Success','Your Reviews has been added!!');
    }

    // rendered one reviews
    public function show($review)
    {
        # code...
    }

    // edit reviews
    public function edit($id)
    {
        $review = \App\Review::findOrFail($id);
        $user = auth()->user();

        if (Gate::allows('edit-review',$review)){
            return view('/reviews/edit', compact('review'));
        }
        else{
            return redirect('/')->with('fail','you dont have the permission to edit this review!');
        }
    }

    // update the edited review
    public function update($id)
    {
        // Validate Request
        $data = request()->validate([
            'title' => 'required|min:5',
            'rating' => 'required|digits_between:0,10',
            'content' => 'required|min:20',
        ]);

        // get the review
        $review = Review::findOrFail($id);

        // Update the Review
        $review->update($data);

        return redirect('/reviews');
    }

    // delete the reviews
    public function destroy($id)
    {
        // get the review
        $review = \App\Review::findOrFail($id);

        // FOR Admin when review is deleted redirect to the overview review page

        if (Gate::allows('delete-review',$review)){
            // delete this review
            $review->delete();

            return redirect('/overview/reviews')->with('success','Review had been deleted!!');
        }
        else{
            return redirect('/')->with('success','Insufficient Access!!');
        }

        return redirect('/reviews');
    }
}
