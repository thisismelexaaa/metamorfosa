@extends('layouts.app')

@section('title')
    Login
@endsection

@section('content')
    <section>
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-7">
                    <img class="bg-img-cover bg-center" src="{{ asset('assets/panel/images/login/2.jpg') }}" alt="login page">
                </div>
                <div class="col-xl-5 p-0">
                    <div class="login-card">
                        <form class="theme-form login-form" method="POST" action="{{ route('login') }}">
                            @csrf
                            <h4>{{ __('Login') }}</h4>
                            <h6>Welcome back! Log in to your account.</h6>
                            <div class="form-group">
                                <label for="login">Email / Username</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="icon-email"></i></span>
                                    <input id="login" class="form-control @error('username') is-invalid @enderror"
                                        type="text" placeholder="john.doe@gmail.com / john.doe"
                                        value="{{ old('username') }}" name="username" required autofocus>
                                    @error('username')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="icon-lock"></i></span>
                                    <input id="password" class="form-control @error('password') is-invalid @enderror"
                                        type="password" name="password" required placeholder="*********">
                                    <div class="show-hide"><span class="show"></span></div>
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary btn-block" type="submit">Sign in</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
