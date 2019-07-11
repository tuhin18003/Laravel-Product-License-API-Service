@extends('layouts.auth')

@section('header')
<link href="{{ asset('app-assets/css/pages/register.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="col s12 m6 l7 z-depth-4 card-panel border-radius-6 register-card bg-opacity-8">
<form class="login-form" method="POST" action="{{ route('login') }}">
    @csrf
    <div class="row">
        <div class="col l5 offset-2 right-dashed-border">
            <div class="input-field col s12 text-center ptb-30">
                <h5 class="ml-4">Login</h5>
                <p class="ml-4">Login to access your account!</p>
                <img src="{{ asset('app-assets/images/logo/logo-footer.png') }}" width="" height="" alt=""/>
                <p>
                    Don't have an account? <a href="{{ route('register') }}">Signup now</a>! <br>
                    @if (Route::has('password.request'))
                    <a class="" href="{{ route('password.request') }}">
                        {{ __('Forgot Your Password?') }}
                    </a>
                    @endif
                </p>
            </div>
        </div>
        <div class="col l7 mt-40 ">
            @if (session('success_status'))
                <div class="alert alert-success" role="alert">
                    {{ session('success_status') }}
                </div>
            @endif
            @if (session('verified'))
                <div class="alert alert-success" role="alert">
                    {{ __('Your email has been verified successfully! Please log in to get started!') }}
                </div>
            @endif
            <div class="input-field col s12">
                <i class="material-icons prefix pt-2">mail_outline</i>
                <input id="email" type="email" name='email' class="{{ $errors->has('email') ? ' validate invalid' : '' }}" value="{{ old('email') }}" required aria-required="true" >
                <label for="email">Email*</label>
                @if ($errors->has('email'))
                    <div class="error" role="alert">
                        <strong>{{ $errors->first('email') }}</strong>
                    </div>
                @endif
            </div>
            <div class="input-field col s12">
                <i class="material-icons prefix pt-2">lock_outline</i>
                <input id="password" type="password" name='password' class="{{ $errors->has('password') ? ' validate invalid' : '' }}" required aria-required="true">
                <label for="password">Password*</label>
                @if ($errors->has('password'))
                    <div class="error" role="alert">
                        <strong>{{ $errors->first('password') }}</strong>
                    </div>
                @endif
            </div>
            <div class="col s12 m12 l12 ml-2 mt-1">
                <p>
                    <label>
                      <input type="checkbox" name="remember"/>
                      <span>Remember Me</span>
                    </label>
                  </p>
            </div>
            <div class="input-field col s12">
                <button type="submit" class="btn waves-effect waves-light border-round gradient-45deg-purple-deep-orange col s12">Login</button> 
            </div>
        </div>
    </div>
</form>
</div>
@endsection
