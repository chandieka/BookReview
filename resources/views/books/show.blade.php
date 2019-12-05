@extends('layouts.app')

@section('title', 'Create Books')

@section('content')
<div class="container">
    

<div class="shadow-sm p-5 mb-3 bg-light col-10">
            <div>
                <h1>
                    {{ $book->name }}
                </h1>
                <br>
                <image height="250em" width="250em" src=""/>
                <br>
                <br>
                <h3>
                    Description : 
                    <br>
                    <br>
                    {{ $book->description}}
                </h3>
            </div>
            <div>
                <br>
                <p>
                    Published : {{ $book->date }}
                </p>
            </div>
        </div>

</div>
@endsection