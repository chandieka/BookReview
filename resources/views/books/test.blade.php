<link href="{{ public_path(). '/css/pdf.css' }}" rel="stylesheet">

@foreach($books as $book)
<div>
    <div>
        <h1>{{ $book->title }}</h1>
    </div>
    <div>
        <h2>{{ $book->author }}</h2>
    </div>
    <div>
    @if($book->image)
        <img class="sized" src="{{ public_path() . '/storage/' . $book->image }}">
    @else
        <img class="sized" src="{{ public_path() . '/assets/default/defaultBook.png' }}">
    @endif
    </div>
    <div class="desc">
        {{ $book->description }}
    </div>
</div>
@endforeach