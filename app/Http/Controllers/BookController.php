<?php

namespace App\Http\Controllers;

use App\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{

    public function requestValidate(Request $request)
    {
        return $request->validate([
            'title' => 'required',
            'description' => 'required',
            'date' => 'required',
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
        $data = $this->requestValidate($request);

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
        return view('books/show', compact('book', 'id', 'reviews'));
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
        return view('books/edit',compact('book','id'));
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
