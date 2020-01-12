<link href="{{ public_path(). '/css/pdf.css' }}" rel="stylesheet">

@foreach($books as $book)
<div>
    <h1>{{ $book->title }}</h1>
</div>
    <img class="sized" src="{{ public_path() . '/storage/' . $book->image }}">
    <div class="desc">
        {{ $book->description }}
    </div> 
@endforeach

