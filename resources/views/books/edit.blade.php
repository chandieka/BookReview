@extends('layouts.app')

@section('title', 'Edit a Book')

@section('content')

<div class="container">
      <h2>Edit A Book</h2><br  />
        <form method="POST" action="/books/{{$id}}">
        <input name="_method" type="hidden" value="PATCH">
        @csrf
        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-6">
            <label for="Name">Name:</label>
            <input type="text" class="form-control" name="name" value="{{$book->name}}">
            @error('name')
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
        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-6" style="margin-top:60px">
            <button type="submit" class="btn btn-success">Update</button>
          </div>
        </div>
      </form>
    </div>

@endsection