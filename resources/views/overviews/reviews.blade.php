@extends('layouts.app')

@section('title', 'All Reviews')

@section('content')
<div class="container">
    <div class="rounded-circle shadow-sm mb-2">
        <div class="bg-dark rounded p-2 row">
            <h1 class="text-white col" style="margin: 0">
                    Reviews Overview
            </h1>
        </div>
    </div>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">User</th>
                <th scope="col">Title</th>
                <th scope="col">Rating</th>
                <th scope="col">Manipulation</th>
            </tr>
        </thead>

        @forelse ($reviews as $review)
            <tr>
                <th scope="row"><a href="/books/{{$review->book_id}}"> {{ $review->id }} </a></th>
                <td class=""><a href="">{{ $review->user->name}}</a></td>
                <td class=""> {{ $review->title }} </td>
                <td class=""> {{ $review->rating }} </td>
                <td>
                    <div class="row mr-1 justify-content-center">
                        <form action="/overview/reviews/{{ $review->id }}" method="POST" class="col-2 mr-1 ml-1"  onsubmit="return confirm('Do you want to delete this review?');">
                            @csrf
                            @method('DELETE')
                            <div class="row">
                                <button type="submit" class="btn btn-danger col">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </div>
                        </form>
                        {{-- Not sure if Admin can edit some other plebs stuff --}}
                        {{-- <a name="edit" class="btn btn-primary col-2 mr-1 ml-1" href="/reviews/{{ $review->id }}/edit" role="button">
                            <i class="fas fa-edit"></i>
                        </a> --}}
                    </div>
                </td>
            </tr>
        @empty
            <tr>
                <th scope="row">1</th>
                <td>N/A</td>
                <td>N/A</td>
                <td>N/A</td>
                <td>N/A</td>
            </tr>
        @endforelse
    </table>
    <div class="d-flex justify-content-center">
        {{ $reviews }}
    </div>
</div>
@endsection
