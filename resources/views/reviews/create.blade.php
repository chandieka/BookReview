@extends('layouts.app')

@section('title', 'Create Reviews')

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
    <form action="{{ route('reviews.store') }} " class="bg-light shadow-sm p-3" method="POST">
        <div class="row">
            <div class="form-group col-6">
                <label for="title">Title:</label>
                <input class="form-control" type="text" name="title" placeholder="Enter the title of the Review here..." value="">
                @error('title')
                    <strong>{{ $message }}</strong>
                @enderror
            </div>
            <div class="form-group col-6">
                <label for="rating">Rating: (0-10) </label>
                <input class="form-control" type="number" name="rating" placeholder="Enter the rating of the Review here..." value="">
                @error('rating')
                    <strong>{{ $message }}</strong>
                @enderror
            </div>
        </div>
        <div class="form-group">
            <label for="content"> Review: </label>
            <textarea class="form-control" name="content" rows="10" placeholder="Enter the content of the Review here..."></textarea>
            @error('content')
                <strong>{{ $message }}</strong>
            @enderror
        </div>
        @csrf
        <input type="text" name="book_id" hidden value="{{$id}}">
        <button type="submit" class="btn btn-primary">Submit</button>
        <button type="reset" class="btn btn-primary">Reset</button>
    </form>
</div>
@endsection
