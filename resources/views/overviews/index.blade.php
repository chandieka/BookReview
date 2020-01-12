@extends('layouts.app')

@section('title', 'Overviews')

@section('content')
<div class="container">
     @if (\Session::has('fail'))
      <div class="alert alert-success">
        <p>{{ \Session::get('fail') }}</p>
      </div><br />
    @endif
    <div class="row">
        @forelse ($books as $book)
        <div class="shadow-sm p-5 mb-3 bg-light col-4">
            <div>
                <div class="row align-items-center">
                    <h1 class="col">
                        @if(strlen($book->title) > 15)
                        <a class="nostyle" href="/books/{{ $book->id }}">{{ substr($book->title, 0, 14) }}...</a>
                        @else
                        <a class="nostyle" href="/books/{{ $book->id }}">{{ $book->title }}</a>
                        @endif
                    </h1>
                </div>
                @if($book->image)
                    <div class="row col-9 float-left">
                    <a class="nostyle" href="/books/{{ $book->id }}"><img src="{{ asset('storage/' . $book->image) }}" class="img-thumbnail"></a>
                    </div>
                @else
                    <div class="row col-9 float-left">
                    <a class="nostyle" href="/books/{{ $book->id }}"><img src="{{ asset('assets/default/defaultBook.png') }}" class="img-thumbnail"></a>
                    </div>
                @endif
                <div class="align-items-center">
                    {{ substr($book->description, 0, 100) }}...
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
    <div class="d-flex justify-content-center">
        {{$books }}
    </div>
</div>

@endsection
