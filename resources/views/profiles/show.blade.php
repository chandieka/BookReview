@extends('layouts.app')

@section('title', 'My Profile')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="profilePicture">
            @if($profile->image)
                <div class="image">
                    <img src="{{ asset('storage/' . $profile->image) }}" class="img-thumbnail">
                </div>
            @endif
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Personal Information</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <p>Name: {{ $profile->name }}</p>
                    <p>Mail: {{ $profile->email }}</p>
                
                    <a href="{{action('UserController@edit', $profile->id)}}" class="btn btn-primary">Edit personal information</a>
                    <form action="{{ action('UserController@destroy', $profile->id) }}" onsubmit="return confirm('Are you sure you want to delete this account?')" method="POST" class="right">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-primary">
                            Delete Account
                        </button>  
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
