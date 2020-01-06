@extends('layouts.app')

@section('title', 'My Profile')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="profilePicture">
            <div class="image">
                @if($profile->image)
                    <a href="{{action('UserController@edit', $profile->id)}}" title="Upload a new profile picture">
                        <img src="{{ asset('storage/' . $profile->image) }}" class="img-thumbnail">
                    </a>
                @else
                    <a href="{{action('UserController@edit', $profile->id)}}" title="Upload a profile picture">
                        <img src="{{ asset('assets/' . 'default/default.png') }}" class="img-thumbnail">
                    </a>
                @endif
            </div>
        </div>
        <div class="col-md-8">
            <div class="card details">
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
