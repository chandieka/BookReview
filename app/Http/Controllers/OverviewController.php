<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
}
