@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Personal Information</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <p>Name: {{ Auth::user()->name }}</p>
                    <p>Mail: {{ Auth::user()->email }}</p>
                
                    <button onclick="window.location='{{ route("editProfile") }}'" class="btn btn-primary">
                        Edit personal information
                    </button>
                    <button onclick="confirmDelete('{{ route("deleteProfile") }}')" class="btn btn-primary right">
                        Delete my Account
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
