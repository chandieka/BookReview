@extends('layouts.app')

@section('title', 'Profile Overview')

@section('content')
    <div class="container">
    <div class="rounded-circle shadow-sm mb-2">
        <div class="bg-dark rounded p-2 row">
            <h1 class="text-white col-11" >
                    Profile Overview
            </h1>
            {{-- change URL --}}
            <script>
                let create = function()
                {
                    window.location.href = 'profiles/create';
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
        <th>Username</th>
        <th>Email</th>
        <th>Is Admin</th>
      </tr>
    </thead>
    <tbody>
      
      @foreach($profiles as $profile)
      <tr>
        <td><a href="/profiles/" class="link-no-highlight">{{ $profile->name }}</a></td>
        <td><a href="/profiles/" class="link-no-highlight">{{ $profile->email }}</a></td>
        <td>
          <div>
            <input type="checkbox">
          </div>
        </td>
        <td><a href="{{action('BookController@edit', $profile->id)}}" class="btn btn-warning">Edit</a></td>
        <td>
          <form action="{{action('BookController@destroy', $profile->id)}}" method="post">
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