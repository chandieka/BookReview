<?php

namespace App\Http\Controllers;

use App\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{

    public function requestValidate()
    {
        return request()->validate([
            'title' => 'required',
            'description' => 'required',
            'date' => 'required',
            'genres' => 'exists:genres,id',
        ]);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books=\App\Book::paginate(8);
        return view('books/index',compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $genres=\App\Genre::all();
        return view('books/create', compact('genres'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validate the datas
        $this->requestValidate($request);
        $data = request(['title', 'description', 'date', 'author', 'image']);

        // create the book
        $book = \App\Book::create($data);

        $book->genres()->attach(request('genre'));

        return redirect('books')->with('success', 'A book has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $book = \App\Book::findOrFail($id);
        $reviews = \App\Review::where('book_id', $book->id)->paginate(4);
        $genres = $book->genres;
        return view('books/show', compact('book', 'reviews', 'genres'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $book = \App\Book::findOrFail($id);
        $all_genres = \App\Genre::all();
        if(!is_null($book->genres))
        {
        $book_genres = $book->genres;
        }
        else
        {
            $book_genres = [];
        }
        return view('books/edit',compact('book','all_genres', 'book_genres'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $book = \App\Book::findOrFail($id);
        $book->title = $request->get('title');
        $book->description = $request->get('description');
        $book->date = $request->get('date');
        $book->author = $request->get('author');
        if (request()->has('image')) {
            request()->validate([
                'image' => 'file|image',
            ]);
            $book->image = request()->image->store('uploads', 'public');
            
            // Scaling the image
            $image = Image::make(public_path('storage/' . $profile->image))->fit(200, 200);
            $image->save();
        }
        $book->save();
        return redirect('books')->with('success', 'A book has been editted');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $book = \App\Book::findOrFail($id);
        $book->delete();
        return redirect('books')->with('success','A book has been  deleted');
    }
}
