@extends('layouts.app')

@section('title', 'Create Reviews')

@section('content')
<div class="container">
    <form action="/web3/public/reviews/" class="">
        <div class="">
            <label for="title">Title:</label>
            <input type="text" name="title " id="title">
        </div>
        <div>
            <label for="rating">Rating:</label>
            <input type="range" name="rating" id="rating">
        </div>
        <div>
            <label for="content"></label>
            <textarea name="content" id="content" cols="30" rows="10"></textarea>
        </div>
    </form>
</div>
@endsection
