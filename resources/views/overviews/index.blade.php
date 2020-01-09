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
                        <a class="nostyle" href="/books/{{ $book->id }}">{{ $book->title }}</a>
                    </h1>
                </div>
                <div class="col-9 float-left">
                    <a class="nostyle" href="/books/{{ $book->id }}"><img src="{{ asset('storage/' . $book->image) }}" class="img-thumbnail"></a>
                </div>
                <div class="float-right">
                    {{ $book->description }}
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
