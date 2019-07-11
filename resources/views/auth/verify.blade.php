@extends('layouts.auth')

@section('header')
<link href="{{ asset('app-assets/css/pages/register.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="col s12 m6 l4 z-depth-4 card-panel border-radius-6 register-card bg-opacity-8">
<div class="row">
    <div class="input-field col s12 text-center register-success">
        <img src="{{ asset('app-assets/images/logo/logo-footer.png') }}" width="" height="" alt=""/>
        <h5 class="ml-4">{{__( 'Verify Your Email Address!' ) }} </h5>
        <p class="ml-4">{{ __('Before proceeding, please check your email for a verification link.') }}</p>
        <div class="card-body">
            @if (session('resent'))
                <div class="alert alert-success" role="alert">
                    {{ __('A fresh verification link has been sent to your email address.') }}
                </div>
            @endif
            <p class="ml-4">
                {{ __('If you did not receive the email') }}, <a href="{{ route('verification.resend') }}">{{ __('click here to request another') }}</a>.
            </p>
        </div>
    </div>
</div>
</div>
@endsection



