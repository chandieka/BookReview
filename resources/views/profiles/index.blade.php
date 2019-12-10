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
        </div>
    </div>
    <table class="table table-striped">
    <thead>
      <tr>
        <th>ID</th>
        <th>Username</th>
        <th>Email</th>
        <th>Privilege</th>
      </tr>
    </thead>
    <tbody>
      
      @foreach($profiles as $profile)
      <tr>
        <td>{{ $profile->id }}</td>
        <td><a href="/profiles/show/{{ $profile->id }}" class="link-no-highlight">{{ $profile->name }}</a></td>
        <td>{{ $profile->email }}</a></td>
        @if($profile->isAdmin == true)
        <td> Admin </td>
        @else
        <td> Common User </td>
        @endif
        
        
        <td><form method="POST" action="{{action('UserController@makeAdmin', $profile->id)}}">
          @csrf
          @method('PUT')

          @if($profile->isAdmin == true)
            <input type="checkbox" onChange="this.form.submit()" checked> Admin
            @else
            <input type="checkbox" onChange="this.form.submit()"> Admin
          @endif
        </form></td>

        <td><form action="{{action('UserController@destroy', $profile->id)}}" onsubmit="return confirm('Are you sure you want to delete this profile?')" method="post">
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