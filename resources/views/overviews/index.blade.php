@extends('layouts.app')

@section('title', 'Overviews')
    
@section('content')
<div class="container">
<div class="row">
        @forelse ($books as $book)
<div class="shadow-sm p-5 mb-3 bg-light col-6">
            <div>
                <div class="row align-items-center">
                    <h1 class="col">
                        <a href="/books/{{ $book->id }}">{{ $book->title }}</a>
                    </h1>
                </div>
                <p>
                    Published : {{ $book->date}}
                </p>
            </div>
            <div>
                <p>
                    {{ $book->description }}
                </p>
            </div>
        </div>
        @empty
            <div>
                <h1 class="col-12 text-danger">
                    No Books!
                </h1>
            </div>
        @endforelse
    </div>
    <div class="d-flex justify-content-center">
        {{$books }}
    </div>
</div>
@endsection