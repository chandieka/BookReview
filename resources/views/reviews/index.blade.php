@extends('layouts.app')

@section('title', 'Review Page')

@section('content')
<div class="container">
    <div class="rounded-circle shadow-sm mb-2">
        <div class="bg-dark rounded p-2 row">
            <h1 class="text-white col">
                Review Page
            </h1>
            <a href="/web3/public/reviews/create" class="col-2">
                New Review
            </a>
        </div>
    </div>
    <div class="row">
        @forelse ($reviews as $review)
        <div class="shadow-sm p-5 mb-3 bg-light col-6">
            <div>
                <h1>
                    {{ $review->title }}
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
</div>
@endsection
