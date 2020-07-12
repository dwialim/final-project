@extends('layouts.app')

@section('content')
<div class="form-section">
    <div class="logo-2 clearfix">
        <a href="">
            <img src="{{ asset('css_login/logo-2.png')}}" alt="logo">
        </a>
    </div>
    <h3>Sign into your account</h3>
    <div class="login-inner-form">
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="form-group form-box">
                <input id="email" type="email" placeholder="Email Address" class="input-text @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                <i class="far fa-envelope" style="font-size: 25px;"></i>
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group form-box">
                <input id="password" type="password" placeholder="Password" class="input-text @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                <i class="fas fa-unlock-alt" style="font-size: 25px;"></i>
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="checkbox clearfix">
                <div class="form-check checkbox-theme">
                    <input class="form-check-input" type="checkbox" value="" id="rememberMe">
                    <label class="form-check-label" for="rememberMe">
                        Remember me
                    </label>
                </div>
                <a href="#">Forgot Password</a>
            </div>
            <div class="form-group mb-0">
                <button type="submit" class="btn-md btn-theme btn-block"><i class="fas fa-sign-in-alt"></i> Login</button>
            </div>
            <p class="text">Don't have an account?<a href="#"> Register here</a></p>
        </form>
    </div>
</div>
@endsection