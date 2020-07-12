@extends('layouts.app')

@section('content')
<div class="form-section">
    <div class="logo-2 clearfix">
        <a href="">
            <img src="{{ asset('css_login/logo-2.png')}}" alt="logo">
        </a>
    </div>
    <h3>Register Account</h3>
    <div class="login-inner-form">
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="form-group form-box">
                <input id="name" type="text" placeholder="Name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                <i class="far fa-user" style="font-size: 25px;"></i>
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group form-box">
                <input id="email" type="email" placeholder="E-mail Address" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                <i class="far fa-envelope" style="font-size: 25px;"></i>
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group form-box">
                <input id="password" type="password" placeholder="Password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                <i class="fas fa-unlock-alt" style="font-size: 25px;"></i>
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group form-box">
                <input id="password-confirm" placeholder="Confirm Password" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                <i class="fas fa-unlock-alt" style="font-size: 25px;"></i>
            </div>
            <div class="form-group mb-0">
                <button type="submit" class="btn-md btn-theme btn-block"><i class="fas fa-sign-in-alt"></i> {{ __('Register') }}</button>
            </div>
        </form>
    </div>
</div>
@endsection