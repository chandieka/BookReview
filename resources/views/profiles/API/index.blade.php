@extends('layouts.app')

@section('title', 'Profile Overview')

@section('content')
    <div class="container">
        <div class="rounded-circle shadow-sm mb-2">
            <div class="bg-dark rounded p-2 row">
                <h1 class="text-white col-11" >
                    Profile Overview
                </h1>
            </div>
        </div>
        <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Email</th>
            </tr>
        </thead>
            <tbody id="content">

            </tbody>
        </table>
        <div class="d-flex justify-content-center" id="paginator">
            <nav aria-label="...">
                <ul class="pagination">
                    <li class="page-item">
                        <button class="page-link" onclick="GoBefore()"> < </button>
                    </li>
                    <li class="page-item active">
                        <button class="page-link" id="current">
                            1
                            <span class="sr-only">(current)
                        </button>
                    </li>
                    <li class="page-item">
                        <button class="page-link" onclick="GoAfter()"> > </button>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
    <script src="/js/fetchBook.js"></script>
@endsection
