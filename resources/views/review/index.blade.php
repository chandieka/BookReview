@extends('layouts.app')

@section('title', 'Review Page')
    
@section('content')
<div class="container">
    <div class="rounded-circle shadow-sm mb-2">
        <div class="bg-dark rounded p-2">
            <h1 class="text-white">
                Review Page
            </h1>
        </div>
    </div>
    @forelse ($reviews as $review)
        <div class="shadow-sm p-5 mb-3 bg-light">
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
            <h1>
                No Review!
            </h1>
        </div>
    @endforelse
</div>
@endsection