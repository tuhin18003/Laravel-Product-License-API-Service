@extends('layouts.auth')

@section('header')
<link href="{{ asset('app-assets/css/pages/register.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="col s12 m6 l7 z-depth-4 card-panel border-radius-6 register-card bg-opacity-8">
<form class="login-form" method="POST" action="{{ route('register') }}">
    @csrf
    <div class="row">
        <div class="col l5 offset-2 ">
            <div class="input-field col s12 text-center pt-60">
                <h5 class="ml-4">Register</h5>
                <p class="ml-4">Join to our community now !</p>
                <img src="{{ asset('app-assets/images/logo/logo-footer.png') }}" width="" height="" alt=""/>
                <p>
                    Already signed up? <a href="{{ route('login') }}">Click here</a> to login. 
                </p>
            </div>
        </div>
        <div class="col l7 p-20 left-dashed-border">
            <div class="input-field col s12">
                <i class="material-icons prefix pt-2">person_outline</i>
                <input id="username" name='full_name' type="text" class="{{ $errors->has('full_name') ? ' validate invalid' : '' }}" value="{{ old('full_name') }}" required aria-required="true" />
                <label for="full_name" class="center-align" >Full Name*</label>
                @if ($errors->has('full_name'))
                    <div class="error" role="alert">
                        <strong>{{ $errors->first('full_name') }}</strong>
                    </div>
                @endif
            </div>
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
            <div class="input-field col s12">
                <i class="material-icons prefix pt-2">lock_outline</i>
                <input id="password-again" type="password" name='password_confirmation' class="{{ $errors->has('password_confirmation') ? ' validate invalid' : '' }}" required aria-required="true">
                <label for="password-again">Password again*</label>
                @if ($errors->has('password_confirmation'))
                    <div class="error" role="alert">
                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                    </div>
                @endif
            </div>
            <div class="input-field col s12">
                <button type="submit" class="btn waves-effect waves-light border-round gradient-45deg-purple-deep-orange col s12">Register</button> 
            </div>
        </div>
        
    </div>
</form>
</div>
@endsection
