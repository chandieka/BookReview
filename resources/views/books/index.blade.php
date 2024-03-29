@extends('layouts.app')

@section('title', 'Books Page')

@section('content')
    <div class="container">
    <div class="rounded-circle shadow-sm mb-2">
        <div class="bg-dark rounded p-2 row">
            <h1 class="text-white col-11" >
                    Books Page
            </h1>
            {{-- change URL --}}
            <script>
                let create = function()
                {
                    window.location.href = 'books/create';
                };
            </script>

        </div>
    </div>
    <div class="row mb-2">
        <a href="{{action('BookController@export_pdf')}}" class="btn btn-warning col-1 mr-1">PDF</a>
        <button type="button" class="btn btn-primary col-1" onclick="create();" data-toggle="tooltip" data-placement="bottom" title="Create A New Book" >
                <i class="fas fa-plus"></i>
        </button>
    </div>
    <table class="table table-striped">
    <thead>
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Description</th>
        <th colspan="2">Originally Published</th>
      </tr>
    </thead>
    <tbody>

      @foreach($books as $book)
      <tr>
        <td><a href="/books/{{$book->id}}" class="nostyle">{{ $book->id }}</a></td>
        <td><a href="/books/{{$book->id}}" class="nostyle">{{ $book->title }}</a></td>
        <td>{{ str_limit($book->description, 100) }}</td>
        <td>{{ $book->date }}</td>

        <td><a href="{{action('BookController@edit', $book->id)}}" class="btn btn-warning">Edit</a></td>
        <td>
          <form action="{{action('BookController@destroy', $book->id)}}" method="post" onsubmit="return confirm('Do you want to delete this book?');">
            @csrf
            <input name="_method" type="hidden" value="DELETE">
            <button class="btn btn-danger" type="submit" onsubmit="return confirm('Do you want to delete this review?');">Delete</button>
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
  <div class="d-flex justify-content-center">
        {{ $books }}
    </div>
  @if (\Session::has('success'))
      <div class="alert alert-success">
        <p>{{ \Session::get('success') }}</p>
      </div><br />
     @endif
  </div>
@endsection
