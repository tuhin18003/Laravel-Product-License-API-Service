@extends('layouts.auth')

@section('content')
<div class="col s12 m6 l7 z-depth-4 card-panel border-radius-6 register-card bg-opacity-8">
<form class="login-form" method="POST" action="{{ route('password.update') }}">
    @csrf
    <input type="hidden" name="token" value="{{ $token }}">
    <div class="row">
        <div class="col l5 offset-2 right-dashed-border">
            <div class="input-field col s12 text-center ptb-30">
                <h5 class="ml-4">{{ __('Reset Password') }}</h5>
                <p class="ml-4">Reset your account password!</p>
                <img src="{{ asset('app-assets/images/logo/logo-footer.png') }}" width="" height="" alt=""/>
                <p>
                    @if (Route::has('login'))
                    <a class="" href="{{ route('login') }}">
                        << {{ __('Back to Login') }}
                    </a>
                    @endif
                </p>
            </div>
        </div>
        <div class="col l7 mt-40 ">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
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
                <button type="submit" class="btn waves-effect waves-light border-round gradient-45deg-purple-deep-orange col s12">
                    {{ __('Reset Password') }}
                </button>
            </div>
            
            
        </div>
        
    </div>
</form>
</div>
@endsection
