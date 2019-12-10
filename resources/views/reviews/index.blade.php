@extends('layouts.app')

@section('title', 'Review Page')

@section('content')
<div class="container">
    <script>
        let create = function()
        {
            window.location.href = 'reviews/create';
        };
    </script>
    <div class="rounded-circle shadow-sm mb-2">
        <div class="bg-dark rounded p-2 row align-items-center">
            <div class="text-white col">
                <h1 class="text-white col" >
                    Review Page
                </h1>
            </div>
        </div>
    </div>
    <div class="row">
        @forelse ($reviews as $review)
        <div class="shadow-sm p-5 mb-3 bg-light col-6">
            <div>
                <div class="row align-items-center">
                    <h1 class="col-10">
                        <a href="/books/{{ $review->book_id }}">{{ $review->title }}</a>
                    </h1>
                    <div class="col-2">
                        <div class="row">
                            <form action="{{route('reviews.delete', $review->id )}} " method="POST" class="col" onsubmit="return confirm('Do you want to delete this review?');">
                                @csrf
                                @method('DELETE')
                                <div class="row">
                                    <button type="submit" class="btn btn-danger col">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </div>
                            </form>
                            <a name="edit" class="btn btn-warning col" href="/reviews/{{ $review->id }}/edit" role="button">
                                <i class="fas fa-edit"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <p>
                    Rating : {{ $review->rating}}
                </p>
            </div>
            <div>
                <p>
                    {{ $review->content }}
                </p>
            </div>
        </div>
        @empty
            <div class="col-12 justify-content-center">
                <h1 class="text-danger">
                    No Review!
                </h1>
            </div>
        @endforelse
    </div>
    <div class="d-flex justify-content-center">
        {{$reviews }}
    </div>
</div>
@endsection
