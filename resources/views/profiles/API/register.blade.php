@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>
                <div class="card-body">
                    <form>
                        <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right"> Name </label>
                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control" name="name"  required autocomplete="name" autofocus>
                        </div>
                        </div>
                        <div class="form-group row">
                            <label for="Email" class="col-md-4 col-form-label text-md-right"> Email </label>
                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="Email"  required autocomplete="Email" autofocus>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right"> Password </label>
                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password"  required autocomplete="password" autofocus>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="repassword" class="col-md-4 col-form-label text-md-right"> Re-Password </label>
                            <div class="col-md-6">
                                <input id="rePassword" type="password" class="form-control" name="rePassoword"  required autocomplete="password" autofocus>
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button class="btn btn-primary" id="register">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="/js/postNewUser.js"></script>
</div>
@endsection
