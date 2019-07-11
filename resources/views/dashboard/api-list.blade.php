@extends('layouts.app')

@section('title', 'Generate API')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @include('dashboard.notification')
            <h4 class="header">API Keys</h4>
            <p>Your generated API keys list</p>
            @include('dashboard.status')
            <div class="card card-override mb-40">
                <div class="card-title">API Keys</div>
                <div class="card-content ">
                    @if( count($apis) >= 1)
                    <table class="">
                        <tr>
                            <th>Label</th>
                            <th>Api Key</th>
                            <th>Package</th>
                            <th></th>
                        </tr>
                    @foreach( $apis as $api )
                    <tr>
                        <td>{{ $api->label}}</td>
                        <td>{{ $api->api_key}}</td>
                        <td>{{ $api->name}} <br> @if(!empty($api->order_number)) #{{$api->order_number}} @endif</td>
                        <td><a href="{{ route('revoke-api', [ 'id' => $api->api_id ]) }}">Revoke Access</a></td>
                    </tr>
                    @endforeach
                    
                    </table>
                    @else
                    <div class="alert alert-warning">Sorry! No api key found! <a href="{{ route('key-generator') }}">Generate API key</a> from here.</div>
                    @endif
                </div>
            </div>
            
        </div>
    </div>
</div>
@endsection

@section('footer_script')
<script src="{{ asset('app-assets/js/scripts/ui-alerts.js') }}" defer></script>
@endsection