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
                </div>

                <button onclick="editPersonalInformation()">
                    Edit personal information
                </button>
            </div>
        </div>
    </div>
</div>
@endsection
