<!doctype html>

<!-- @extends('layouts.pdf')

@section('title', 'PDF export')

@section('content')

Hello World! -->

<div class="container">
    <div class="row">
        @forelse ($books as $book)
        <div class="shadow-sm">
            <div>
                <div class="row align-items-center">
                    <h1>
                        {{ $book->title }}
                    </h1>
                    <img class="sized" src="{{ asset('storage/' . $book->image) }}" class="img-thumbnail">
                    <div class="desc">
                        {{ $book->description }}
                    </div>  
                </div>
            </div>
            <div>

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
</div>

<!-- @endsection -->