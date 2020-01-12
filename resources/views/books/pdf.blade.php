<head>
<link href="{{ public_path(). '/css/pdf.css' }}" rel="stylesheet">
</head>
<body>

<div class="container">
    <div class="row">
        <a href="{{ URL::to('/books/exportpdf') }}">Export PDF</a>
        @foreach($books as $book)
            <div>
                <div>
                    <div class="row align-items-center">
                        <h1 class="text-center">
                            {{ $book->title }}
                        </h1>
                        <br>
                        <br>
                        <br>
                        <img src="{{ public_path() . '/storage/' . $book->image }}" class=" sized">
                        <div class="desc text-center">
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