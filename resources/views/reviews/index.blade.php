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
            {{-- change URL --}}
            <button type="button" class="btn btn-primary col-1 align-content-end" onclick="create();" data-toggle="tooltip" data-placement="bottom" title="Create A New Review" >
                <i class="fas fa-plus"></i>
            </button>  
        </div>
    </div>
    <div class="row">
        @forelse ($reviews as $review)
        <div class="shadow-sm p-5 mb-3 bg-light col-6">
            <div>
                <div class="row align-items-center">
                    <h1 class="col">
                        <a href="/reviews/{{ $review->id }}">{{ $review->title }}</a>
                    </h1>
                    <form action="/reviews/{{ $review->id }}" onsubmit="return confirm('Do you want to delete this review?')" method="POST" class="col-2"  >
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">
                            <i class="fas fa-trash-alt"></i> 
                        </button>  
                    </form>
                    <a name="edit" class="btn btn-primary col-1 " href="/reviews/{{ $review->id }}/edit" role="button">
                        <i class="fas fa-edit"></i> 
                    </a>
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
            <div>
                <h1 class="col-12 text-danger">
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
