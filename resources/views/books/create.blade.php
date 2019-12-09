@extends('layouts.app')

@section('title', 'Create a Book')

@section('content')
    <div class="container">
      <h2>Adding a book to the database</h2><br/>
      <form method="POST" action="/books" class="bg-light shadow-sm p-3">
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
        </div>
        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-6 row" style="margin-top:60px">
            @forelse ($genres as $genre)
            <div class="justify-content-center p-2 m-2 multi-choice">
            <input type="checkbox" class="checkbox" id="{{ $genre->name }}" name="genre[]" value="{{ $genre->id }}">
              <i class="fas fa-plus"></i>
              <label class="pointer" for="{{ $genre->name }}">{{ $genre->name }}</label>
              </div>
              </input>
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