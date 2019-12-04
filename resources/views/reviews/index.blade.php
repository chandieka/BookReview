@extends('layouts.app')

@section('title', 'Review Page')

@section('content')
<div class="container">
    <div class="rounded-circle shadow-sm mb-2">
        <div class="bg-dark rounded p-2 row">
            <h1 class="text-white col-11" >
                    Review Page
            </h1>
            {{-- change URL --}}
            <script>
                let create = function()
                {
                    window.location.href = 'reviews/create';
                };
            </script>
            <button type="button" class="btn btn-primary col-1" onclick="create();" data-toggle="tooltip" data-placement="bottom" title="Create A New Review" >
                <i class="fas fa-plus"></i>
            </button>
        </div>
    </div>
    <div class="row">
        @forelse ($reviews as $review)
        <div class="shadow-sm p-5 mb-3 bg-light col-6">
            <div>
                <h1>
                <a href="/reviews/{{ $review->id }}">{{ $review->title }}</a>
                </h1>
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
            <div>
                <h1 class="col-12">
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
