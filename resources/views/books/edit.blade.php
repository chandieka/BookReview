@extends('layouts.app')

@section('title', 'Edit a Book')

@section('content')

<div class="container">
      <h2>Edit A Book</h2><br  />
        <form method="POST" action="/books/{{$book->id}}">
        <input name="_method" type="hidden" value="PATCH">
        @csrf
        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-6">
            <label for="Name">Name:</label>
            <input type="text" class="form-control" name="title" value="{{$book->name}}">
            @error('title')
              <strong>{{ $message }}</strong>
            @enderror
          </div>
        </div>
        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-6">
            <label for="Description">Description:</label>
            <textarea class="form-control" name="description">{{$book->description}}</textarea>
              @error('description')
                <strong>{{ $message }}</strong>
              @enderror
          </div>
        </div>
        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-6">
            <strong>Date : </strong>  
            <input type="date" class="date form-control"  type="text" name="date" value="{{$book->date}}">
            @error('date')
              <strong>{{ $message }}</strong>
            @enderror
         </div>
        </div>
        </div><div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-6">
            <strong>Date : </strong>  
        <p class="below">Image: <input type="file" name="image"></p>
            @error('image')
              <strong>{{ $message }}</strong>
            @enderror
         </div>
        </div>
        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-6 row">
            @forelse ($all_genres as $genre)
            <div class="justify-content-center">
            <input type="checkbox" class="checkbox" id="{{ $genre->name }}" name="genre[]" value="{{ $genre->id }}" onclick="changeColor('{{ $genre->name }}')">
              <label class="multi-choice p-2 m-2" for="{{ $genre->name }}" id="{{ $genre->name }}lbl">{{ $genre->name }}
              <i class="fas fa-plus"></i>
              </label>
            </input>
            </div>
            @if(in_array($genre, $book_genres))
            <script>selectCheckbox('{{ $genre->name }}');</script>
            <script>changeColor('{{ $genre->name }}');</script>
            @empty
            <p>
            No genres found!
            </p>
            @endforelse
          </div>
        </div>
        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-6" style="margin-top:60px">
            <button type="submit" class="btn btn-success">Update</button>
          </div>
        </div>
      </form>
    </div>

@endsection