@extends('layouts.app')

@section('title', 'Edit Reviews')

@section('content')
<div class="container">
    <div class="nav">
        <div>
            {{-- TODO
                    Add Header
                    Add Reset Button
                --}}
        </div>
    </div>
    <form action="{{route('reviews.update', $review->id)}}" method="POST" class="bg-light shadow-sm p-3">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="form-group col-6">
                <label for="title">Title:</label>
            <input class="form-control" type="text" name="title" value="{{ $review->title }}">
                @error('title')
                    <strong>{{ $message }}</strong>
                @enderror
            </div>
            <div class="form-group col-6">
                <label for="rating">Rating: (0-10) </label>
                <input class="form-control" type="number" name="rating" value="{{ $review->rating }}">
                @error('rating')
                    <strong>{{ $message }}</strong>
                @enderror
            </div>
        </div>
        <div class="form-group">
            <label for="content"> Review: </label>
            <textarea class="form-control" name="content" rows="10">{{ $review->content }}</textarea>
            @error('content')
                <strong>{{ $message }}</strong>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        <button type="reset" class="btn btn-primary">Reset</button>
    </form>
</div>
@endsection
