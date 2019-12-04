@extends('layouts.app')

@section('title', 'Create Books')

@section('content')
    <div class="container">
    <br />
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
            <button type="button" class="btn btn-primary col-1" onclick="create();" data-toggle="tooltip" data-placement="bottom" title="Create A New Review" >
                <i class="fas fa-plus"></i>
            </button>
        </div>
    </div>
    <table class="table table-striped">
    <thead>
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Description</th>
        <th colspan="2">Action</th>
      </tr>
    </thead>
    <tbody>
      
      @foreach($books as $book)
      <tr>
        <td>{{ $book->id }}</td>
        <td>{{ $book->name }}</td>
        <td>{{ $book->description }}</td>
        <td>{{ $book->date }}</td>
        
        <td><a href="{{action('BookController@edit', $book->id)}}" class="btn btn-warning">Edit</a></td>
        <td>
          <form action="{{action('BookController@destroy', $book->id)}}" method="post">
          @csrf
            <input name="_method" type="hidden" value="DELETE">
            <button class="btn btn-danger" type="submit">Delete</button>
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
  @if (\Session::has('success'))
      <div class="alert alert-success">
        <p>{{ \Session::get('success') }}</p>
      </div><br />
     @endif
  </div>
  
@endsection