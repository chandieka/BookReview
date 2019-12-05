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
            <label for="Name">Name:</label>
            <input type="text" class="form-control" name="name" placeholder="Enter the name of the book here...">
            @error('name')
              <strong>{{ $message }}</strong>
            @enderror
          </div>
        </div>
        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-6">
            <label for="Description">Description:</label>
            <textarea class="form-control" name="description" placeholder="Enter the description here..."></textarea>
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
          <div class="form-group col-6" style="margin-top:60px">
            <button type="submit" class="btn btn-primary">Create</button>
          </div>
        </div>
      </form>
    </div>
@endsection