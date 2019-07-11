@extends('layouts.app')

@section('title', 'Generate API')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @include('dashboard.notification')
            <h4 class="header">API Key Generator fuck</h4>
            <p>Generate your API key from bellow. You can use this API key in any of our products.</p>
            @include('dashboard.status')
            <div class="card-content mb-40">
                <form class="" method="post" action ="{{ route('api') }}">
                    @csrf
                    <div class="card-content">
                        <div class="row">
                            <div class="input-field col s12">
                              <label for="uname0">Label*</label>
                              <input class="validate" required="" aria-required="true" id="label" name="label" type="text">
                              @if ($errors->has('label'))
                                    <div class="error" role="alert">
                                        <strong>{{ $errors->first('label') }}</strong>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class=" col s12">
                              <label for="uname0">Package*</label>
                              <select class="error validate" name="package_id" aria-required="true" required>
                                  <option value="" disabled selected>Choose your package</option>
                                  @foreach($packages as $pckg)
                                      <option value="{{$pckg->id}}">(#{{$pckg->order_number}}) {{$pckg->name}}</option>
                                  @endforeach
                              </select>
                              <div class="input-field">
                              </div>
                              @if ($errors->has('package_id'))
                                    <div class="error" role="alert">
                                        <strong>{{ $errors->first('package_id') }}</strong>
                                    </div>
                                @endif
                            </div>
                        </div>
                        
                    </div>
                    
                    <div class="card-action">
                        <button class="waves-effect waves-light btn gradient-45deg-red-pink">{{__('Generate API Key')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('footer_script')
<script src="{{ asset('app-assets/js/scripts/ui-alerts.js') }}" defer></script>
@endsection