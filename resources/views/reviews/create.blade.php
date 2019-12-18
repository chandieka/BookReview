@extends('layouts.app')

@section('title', 'Create Reviews')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            {{-- TODO
                    Add Header
                    Add Reset Button
                --}}
            <h1>
                Review for book:
                <a name="" id="" class="btn btn-primary" href="{{route('books.show',$book->id)}}" role="button">
                    <h1 style="margin: 0;">
                        {{ $book->title }}
                    </h1>
                </a>
            </h1>
        </div>
        <div class="card-body bg-light shadow-sm p-3">
            <form action="{{ route('reviews.store') }} " method="POST">
                <div class="row">
                    <div class="form-group col-6">
                        <label for="title">Title:</label>
                        <input class="form-control" type="text" name="title" placeholder="Enter the title of the Review here..." value="{{ old('title') }}">
                        @error('title')
                            <strong>{{ $message }}</strong>
                        @enderror
                    </div>
                    <div class="form-group col-6">
                        <label for="rating">Rating: (0-10) </label>
                        <input class="form-control" type="number" name="rating" placeholder="Enter the rating of the Review here..." value="{{old('rating')}}">
                        @error('rating')
                            <strong>{{ $message }}</strong>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label for="content"> Review: </label>
                    {{-- <textarea class="form-control" name="content" rows="10" placeholder="Enter the content of the Review here..."></textarea> --}}
                    <textarea class="description" name="content">{{ old('content') }}</textarea>
                    <script src="{{ asset('node_modules/tinymce/tinymce.js') }}"></script>
                    <script>
                        tinymce.init({
                            selector:'textarea.description',
                            width: 'auto',
                            height: 300
                        });
                    </script>
                    @error('content')
                        <strong>{{ $message }}</strong>
                    @enderror
                </div>
                @csrf
                <input type="text" name="book_id" hidden value="{{$book->id}}">
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection
