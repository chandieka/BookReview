@extends('layouts.app')
<link href="{{ asset('css/profile.edit.css') }}" rel="stylesheet">

@section('title', 'Edit my profile')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Update Personal Information</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="/profiles/{{ $profile->id }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                        <p>Name: <input type="text"  class="form-control" value="{{ $profile->name }}" name="name" id="name"></p>
                        <p>Mail: <input type="email" class="form-control" value="{{ $profile->email }}" name="mail" id="mail"></p>
                        <p class="below">Image: <input type="file" name="image"></p>

                        <button type="submit" class="btn btn-primary">
                            Confirm
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
