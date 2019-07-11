@extends('layouts.app')

@section('header')
<link href="{{ asset('app-assets/css/pages/pricing.css') }}" rel="stylesheet">
@endsection

@section('title', 'Integrated Websites List')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h4 class="header">Integrated Website</h4>
            <p>You have used APIs in the following website's</p>
            <div class="card-content">
                <div class="row">
                    <div class="col-lg-12">
                    <div class="plans-container">
                        @if( empty( $web_history->count() ))
                            @include( 'dashboard.status', [ 'empty' => true, 'msg' => 'Sorry! No data found!' ] )
                        @else
                        <table class="table table-striped">
                            <tr>
                                <th>Website Url</th>
                                <th>API Key</th>
                                <th>Added On</th>
                                <th>Expire On</th>
                                <th></th>
                            </tr>
                            @foreach($web_history as $puh)
                                <tr>
                                    <td>
                                        {{$puh->website_url}}
                                    </td>
                                    <td>
                                        {{$puh->used_api_key}}
                                    </td>
                                    <td>{{$puh->created_on}}</td>
                                    <td>{{$puh->expire_date}}</td>
                                    <td><a href="{{ route('revoke-website', [ 'id' => $puh->int_id ]) }}">Revoke Access</a></td>
                                </tr>

                            @endforeach
                        </table>
                        @endif
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