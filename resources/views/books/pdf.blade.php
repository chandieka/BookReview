<head>
<link href="{{ public_path(). '/css/pdf.css' }}" rel="stylesheet">
</head>
<body>

<div class="container">
    <div class="row">
        <a href="{{ URL::to('/books/exportpdf') }}">Export PDF</a>
        @foreach($books as $book)
            <div class="shadow-sm">
                <div>
                    <div class="row align-items-center">
                        <h1>
                            {{ $book->title }}
                        </h1>
                        <img src="{{ public_path() . '/storage/' . $book->image }}" class="img-thumbnail sized">
                        <div class="desc">
                            {{ $book->description }}
                        </div>  
                    </div>
                </div>
                <div>

                </div>
            </div>
        @endforeach
    </div>
</div>

</body>