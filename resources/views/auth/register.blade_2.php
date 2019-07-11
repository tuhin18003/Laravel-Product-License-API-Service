@extends('layouts.auth')

@section('content')
<div class="col-md-3 register-left">
    <img src="assets/img/logo-footer.png" width="" height="" alt=""/>
    <h3>Welcome</h3>
    <p>You are 30 seconds away from earning your own money!</p>
</div>
<div class="col-md-9 register-right">
    <ul class="nav nav-tabs nav-justified" id="myTab" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">User</a>
        </li>
<!--        <li class="nav-item">
            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Developer</a>
        </li>-->
    </ul>
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
            <h3 class="register-heading">{{ __('Registration') }}</h3>
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="row register-form">
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" class="form-control {{ $errors->has('full_name') ? ' is-invalid' : '' }}" name="full_name" placeholder="Your Full Name *" value="{{ old('full_name') }}" />
                            @if ($errors->has('full_name'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('full_name') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" placeholder="Username *" value="{{ old('username') }}" />
                            @if ($errors->has('username'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('username') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="Password *" value="{{ old('password') }}" />
                            @if ($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control{{ $errors->has('password_confirmation') ? ' is-invalid' : '' }}" name="password_confirmation" placeholder="Confirm Password *" value="{{ old('password_confirmation') }}" />
                            @if ($errors->has('password_confirmation'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('password_confirmation') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="email" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" placeholder="Your Email *" value="{{ old('email') }}" />
                            @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <input type="text" minlength="10" maxlength="" name="website" class="form-control" placeholder="Your Website " value="{{ old('website') }}" />
                        </div>
                        <div class="form-group">
                            <select class="form-control {{ $errors->has('security_ques') ? ' is-invalid' : '' }}" name="security_ques">
                                <option class="hidden"  selected disabled>Please select your Security Question</option>
                                <option @if( old('security_ques') == 1) selected="selected" @endif value="1" >What is your Birth date?</option>
                                <option @if( old('security_ques') == 2) selected="selected" @endif value="2">What is Your old Phone Number</option>
                                <option @if( old('security_ques') == 3) selected="selected" @endif value="3">What is your Pet Name?</option>
                            </select>
                            @if ($errors->has('security_ques'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('security_ques') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control {{ $errors->has('secret_ques_ans') ? ' is-invalid' : '' }}" name="secret_ques_ans" placeholder="Enter Your Answer *" value="{{ old('secret_ques_ans') }}" />
                            @if ($errors->has('secret_ques_ans'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('secret_ques_ans') }}</strong>
                                </span>
                            @endif
                        </div>
                        
                        <a href="{{ route('login') }}" class="btnRegister"> Login </a>
                        <input type="submit" class="btnRegister"  value="Register"/>
                        
                    </div>
                </div>
            </form>
        </div>
        <div class="tab-pane fade show" id="profile" role="tabpanel" aria-labelledby="profile-tab">
            <h3  class="register-heading">Apply as a Hirer</h3>
            <div class="row register-form">
                <div class="col-md-6">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="First Name *" value="{{ old('username') }}" />
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Last Name *" value="{{ old('username') }}" />
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control" placeholder="Email *" value="{{ old('username') }}" />
                    </div>
                    <div class="form-group">
                        <input type="text" maxlength="10" minlength="10" class="form-control" placeholder="Phone *" value="" />
                    </div>


                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <input type="password" class="form-control" placeholder="Password *" value="" />
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" placeholder="Confirm Password *" value="" />
                    </div>
                    <div class="form-group">
                        <select class="form-control">
                            <option class="hidden"  selected disabled>Please select your Sequrity Question</option>
                            <option>What is your Birthdate?</option>
                            <option>What is Your old Phone Number</option>
                            <option>What is your Pet Name?</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="`Answer *" value="" />
                    </div>
                    <input type="submit" class="btnRegister"  value="Register"/>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
