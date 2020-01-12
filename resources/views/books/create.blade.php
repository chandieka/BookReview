@extends('layouts.app')

@section('title', 'Create a Book')

@section('content')
    <div class="container">
      <h2>Adding a book to the database</h2><br/>
      <form method="POST" action="/books" class="bg-light shadow-sm p-3" enctype="multipart/form-data">
      @csrf
      <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-6">
            <label for="Name">Title:</label>
            <input type="text" class="form-control" name="title" placeholder="Enter the title of the book here..." required>
            @error('title')
              <strong>{{ $message }}</strong>
            @enderror
          </div>
        </div>
        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-6">
            <label for="Name">Author:</label>
            <input type="text" class="form-control" name="author" placeholder="Enter the author of the book here..." required>
            @error('author')
              <strong>{{ $message }}</strong>
            @enderror
          </div>
        </div>
        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-6">
            <label for="Description">Description:</label>
            <textarea class="form-control" name="description" placeholder="Enter the description here..." required></textarea>
              @error('description')
                <strong>{{ $message }}</strong>
              @enderror
          </div>
        </div>
        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-6">
            <strong>Date : </strong>  
            <input type="date" class="date form-control"  type="text" name="date" required>
            @error('date')
              <strong>{{ $message }}</strong>
            @enderror
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
            @forelse ($genres as $genre)
            <div class="justify-content-center">
            <input type="checkbox" class="checkbox" id="{{ $genre->name }}" name="genre[]" value="{{ $genre->id }}" onclick="changeColor('{{ $genre->name }}')">
              <label class="multi-choice p-2 m-2" for="{{ $genre->name }}" id="{{ $genre->name }}lbl">{{ $genre->name }}
              <i class="fas fa-plus"></i>
              </label>
            </input>
            </div>
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
            <button type="submit" class="btn btn-primary">Create</button>
          </div>
        </div>
      </form>
    </div>
@endsection