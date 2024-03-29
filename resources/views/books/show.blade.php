@extends('layouts.app')

@section('title', 'Book Page')

@section('content')
<div class="container shadow-sm p-5 mb-3 bg-light">
    <div class="card mb-4">
        <div class="card-header">
            <h1 >
                {{ $book->title }}
            </h1>
        </div>
        <div class="p-4 row">
            <div class="col-5 image">
                @if($book->image)
                    <a href="{{action('BookController@edit', $book->id)}}" title="Upload the book's picture">
                    <img src="{{ asset('storage/' . $book->image) }}" class="img-thumbnail">
                    </a>
                @else
                    <a href="{{action('BookController@edit', $book->id)}}" title="Upload the book's picture">
                        <img src="{{ asset('assets/default/defaultBook.png') }}" class="img-thumbnail">
                    </a>
                @endif
            </div>
            <div class="col-7">
                <div class="row">
                    @forelse ($genres as $genre)
                    <div class="justify-content-center p-2 ml-3 multi-choice"> {{ $genre->name }} </div>
                    @empty
                        No genres!
                    @endforelse
                </div>
                <br>
                <h3>
                    {{ $book->description}}
                </h3>
                <p>
                    Published on: {{ $book->date }}
                    <br>
                    Published by: {{ $book->author }}
                </p>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            <div class="row">
                <h1 class="col-11" style="margin: 0;">
                    Reviews
                </h1>
                <button class="col-1 btn btn-primary" onclick="window.location.href = '/reviews/create/{{$book->id}}'; ">
                    <i class="fas fa-plus"></i>
                </button>
            </div>
        </div>
        <div class="row card-body ml-1 mr-1">
            @forelse ($reviews as $review)
                <div class="shadow-sm p-3 mb-3 bg-light col-5 ml-md-5">
                    <div class="">
                        <div>
                            <div class="row align-items-center">
                                <h1 class="col">
                                    {{ $review->title }}
                                </h1>
                                <div class="col">
                                    <div class="row justify-content-end">
                                        <div class="col-6">
                                            By: {{$review->user->name}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <p>
                                Rating : {{ $review->rating }}
                            </p>
                        </div>
                        <div>
                            <p>
                                {!! $review->content !!}
                            </p>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 justify-content-center">
                    <h1 class="text-danger">
                        No Review!
                    </h1>
                </div>
            @endforelse
        </div>
        <div class="d-flex justify-content-center">
            {{$reviews }}
        </div>
    </div>
</div>
@endsection
