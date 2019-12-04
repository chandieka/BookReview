@extends('layouts.app')

@section('title', 'Create Reviews')

@section('content')
<div class="container">
    <form action="/web3/public/reviews/" method="POST" class="">
        <h1 class="d-flex justify-content-center">
                New Review!
        </h1>
        <div class="bg-light shadow-sm p-3">
            <div class="row">
                <div class="form-group col-6">
                    <label for="title">Title:</label>
                    <input class="form-control" type="text" name="title " id="title">
                </div>
                <div class="form-group col-6">
                    <label for="rating">Rating: (0-10) </label>
                    <input class="form-control" type="number" name="rating" id="rating">
                </div>
            </div>
            <div class="form-group">
                <label for="content"> Review: </label>
                <textarea class="form-control" name="content" id="content" rows="10"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            <button class="btn btn-primary" onclick="">Reset</button>
        </div>
    </form>
</div>
@endsection
