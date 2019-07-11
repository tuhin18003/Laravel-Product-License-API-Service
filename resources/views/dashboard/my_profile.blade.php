@extends('layouts.app')

@section('header')
<link href="{{ asset('app-assets/css/pages/pricing.css') }}" rel="stylesheet">
@endsection

@section('title', 'My Profile')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h4 class="header">My Profile</h4>
            <p>You can update your profile information from here.</p>
            <div class="card-content">
                <div class="row">
  <div class="col s12">
    <div id="input-fields" class="card card-tabs">
      <div class="card-content">
        <div class="card-title">
          <div class="row">
            <div class="col s12 m6 l12">
              <!--<h4 class="card-title">Input Fields</h4>-->
              @include( 'dashboard.status' )
            </div>
          </div>
        </div>
          <div class="row">
            <div class="col s12">
                <form class="row" method="post" action="{{route('update-profile')}}">
                    @csrf
                <div class="col s12">
                    <div class="input-field col s12">
                        <input placeholder="Placeholder" id="first_name1" name="full_name" type="text" class="validate" value="{{$User->full_name}}" required="">
                        <label for="first_name1">Full Name</label>
                    </div>
                    <div class="input-field col s12">
                        <input placeholder="Placeholder" id="email" name="email" type="text" class="validate" value="{{$User->email}}" required="">
                        <input type="hidden" name="old_email" value="{{$User->email}}" >
                        <label for="Email">Email</label>
                        @if (session('email_exists'))
                            <div class="error" role="alert">
                                <strong>{{ session('email_exists') }}</strong>
                            </div>
                        @endif
                    </div>
                    <div class="input-field col s12">
                        <input placeholder="Keep blank if you don't want to change your password" id="password" name="password" type="password" class="validate" value="">
                        <label for="password">Password</label>
                    </div>
                    <div class="input-field col s12">
                        <input placeholder="Keep blank if you don't want to change your password" id="password" name="cpassword" type="password" class="validate" value="">
                        <label for="password">Confirm Password</label>
                        @if (session('cpassword'))
                            <div class="error" role="alert">
                                <strong>{{ session('cpassword') }}</strong>
                            </div>
                        @endif
                    </div>
                  
                    <div class="input-field col s12">
                      <button class="btn waves-effect waves-light right" type="submit" name="action">Update
                        <i class="material-icons right">send</i>
                      </button>
                    </div>
                </div>
                
                
              </form>
            </div>
          </div>
        
          
              </div>
            </div>
          </div>
        </div>

            </div>
        </div>
    </div>
</div>
@endsection

@section('footer_script')
<script src="{{ asset('app-assets/js/scripts/ui-alerts.js') }}" defer></script>
@endsection