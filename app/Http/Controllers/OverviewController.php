<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OverviewController extends Controller
{
    public function index()
    {
        $books=\App\Book::paginate(12);
        return view('overviews/index',compact('books'));
    }
}
